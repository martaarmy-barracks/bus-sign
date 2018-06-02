<?php

// run this file from the CLI to generate mapdata.js 
// php digest_data.php  > mapdata.js

ini_set('memory_limit', '-1');

// UTILITY FUNCTIONS
function addToArray(&$arr, $key, $val) {
	if(!array_key_exists($key, $arr)) {
		$arr[$key] = array();
	}
	$arr[$key][] = $val;
}
function addIfNotPresent(&$arr, $val) {
	if(!in_array($val, $arr)) {
		$arr[] = $val;
	}
}
function addFrequencyCoded(&$arr, $val) {
	if(!array_key_exists($val, $arr)) {
		$arr[$val] = 1;
	} else {
		$arr[$val] = $arr[$val]+1;
	}
}
$start = time();
function logPercentage($n, $total) {
	global $start;
	$secs = time() - $start;
	str_pad($secs, 4, '0', STR_PAD_LEFT);
	echo "[$secs] ".number_format($n/$total*100, 2) . "%\n";
}

// PROCESSING FUNCTIONS
function generateDataForAgency($agency) {

	$DATA_TO_EXPORT = array();

	// export stop_data
	$stop_data = processStopData($agency);
	$DATA_TO_EXPORT['stop_data'] = $stop_data["BYCODE"];


	$stopcode_to_tripids = mapStopcodeToTripids($agency, $stop_data);

	$tripid_to_routeid = array();
	$tripid_to_shapeid = array();
	$routeid_to_tripids = array();


	mapTripidsRouteidsAndShapeids($agency, $tripid_to_routeid, $tripid_to_shapeid, $routeid_to_tripids);

	// export routeid_to_shapeids
	$routeid_to_shapeids = array();
	foreach($routeid_to_tripids as $routeid => $tripids) {
		$shapeids = array();
		foreach($tripids as $tripid) {
			addFrequencyCoded($shapeids, $tripid_to_shapeid[$tripid]);
		}
		$routeid_to_shapeids[$routeid] = $shapeids;
	}
	$DATA_TO_EXPORT['routeid_to_shapeids'] = $routeid_to_shapeids;

	// export stopcode_to_routeids
	$stopcode_to_routeids = array();
	foreach($stopcode_to_tripids as $stopcode=>$tripids) {
		$routeids = array();
		foreach($tripids as $tripid) {
			addIfNotPresent($routeids, $tripid_to_routeid[$tripid]);
		}
		$stopcode_to_routeids[$stopcode] = $routeids;
	}
	$DATA_TO_EXPORT['stopcode_to_routeids'] = $stopcode_to_routeids;

	// export shapeid_to_shapecoords
	$shapeid_to_shapecoords = processShapeCoords($agency);
	$DATA_TO_EXPORT['shapeid_to_shapecoords'] = $shapeid_to_shapecoords;

	// export route_data
	$route_data = processRouteData($agency);
	$DATA_TO_EXPORT['route_data'] = $route_data;

	return $DATA_TO_EXPORT;
}
function mapStopcodeToTripids($agency, $stop_data) {
	$stoptimes_filename = $agency.'/stop_times.txt';
	$precompiled_filename = $agency.'/stopcode_to_tripids_precompiled.json';

	if(file_exists($precompiled_filename)) {
		if (($precompiled_file = fopen($precompiled_filename, "r")) === FALSE) {
			echo "Could not read $precompiled_filename, proceeding to digest entire file\n";
		} else {
			echo "Reading in precompiled stopcode_to_tripds data for $agency\n";
			$stopcode_to_tripids = json_decode(fgets($precompiled_file));
			fclose($precompiled_file);
			return $stopcode_to_tripids;
		}
	}

	$stopcode_to_tripids = array();
	echo "Digesting $stoptimes_filename\n";
	
	if (($stop_times = fopen($stoptimes_filename, "r")) === FALSE) {
		die('error opening stop_times');
	}

	echo "Counting lines in $stoptimes_filename\n";

	$totalLines = 0;
	while(!feof($stop_times)){
	  $line = fgets($stop_times);
	  $totalLines++;
	}
	echo "Counted total of $totalLines lines\n";

	fclose($stop_times);
	$stop_times = fopen($stoptimes_filename, "r");
	    
	$num = 1;
	$TRIPID_INDEX = NULL;
	$STOPID_INDEX = NULL;
	while(($row = fgetcsv($stop_times, 1000, ",")) !== FALSE) {
		if($num == 1) { 
			$TRIPID_INDEX = array_search('trip_id', $row);
			$STOPID_INDEX = array_search('stop_id', $row);
			echo "DEBUG: stop_id index = $STOPID_INDEX, trip_id index = $TRIPID_INDEX\n";
			$num++; continue;
		}

		$tripid = $row[$TRIPID_INDEX];
		$stopid = $row[$STOPID_INDEX];
        $stopcode = $stop_data["BYID"][$stopid]->stopcode;
		addToArray($stopcode_to_tripids, $stopcode, $tripid);
		$num++;
		if($num%10000==0) { logPercentage($num,$totalLines); };
	}
	fclose($stop_times);

	if(($precompiled_file = fopen($precompiled_filename, 'w')) === FALSE) {
		echo "Could not save precompiled stopcode_to_tripds data. Continuing as normal.";
	} else {
		echo "Saving precompiled stopcode_to_tripds data.\n";
		$precompiled = json_encode($stopcode_to_tripids);
		fwrite($precompiled_file, $precompiled);
		fclose($precompiled_file);
		echo "Saved stopcode_to_tripds.\n";
	}

	echo "Done.\n";

	return $stopcode_to_tripids;
}
function mapTripidsRouteidsAndShapeids($agency, &$tripid_to_routeid, &$tripid_to_shapeid, &$routeid_to_tripids) {

	$trips_filename = $agency."/trips.txt";
	echo "processing $trips_filename\n";

	if (($trips = fopen($trips_filename, "r")) === FALSE) {
		die("error opening $trips_filename!");
	}

	$num = 1;
	$ROUTEID_INDEX = null;
	$DIRECTIONID_INDEX = null;
	$TRIPID_INDEX = null;
	$SHAPEID_INDEX = null;
	while(($row = fgetcsv($trips, 1000, ",")) !== FALSE) {
		if($num == 1) { 
			$ROUTEID_INDEX = array_search('route_id', $row);
			$DIRECTIONID_INDEX = array_search('direction_id', $row);
			$TRIPID_INDEX = array_search('trip_id', $row);
			$SHAPEID_INDEX = array_search('shape_id', $row);
			echo "DEBUG: route_id index = $ROUTEID_INDEX, direction_id index = $DIRECTIONID_INDEX, ".
			     "trip_id index = $TRIPID_INDEX, shape_id index = $SHAPEID_INDEX\n";
			$num++; continue;
		}

		$routeid = $row[$ROUTEID_INDEX] . '_' . $row[$DIRECTIONID_INDEX];
		$tripid = $row[$TRIPID_INDEX];
		$shapeid = $row[$SHAPEID_INDEX];

		if ($tripid == 5308783) echo "Found tripid 5308783";
		
		$tripid_to_routeid[$tripid] = $routeid;
		$tripid_to_shapeid[$tripid] = $shapeid;
		addToArray($routeid_to_tripids, $routeid, $tripid);
	}
	fclose($trips);
	echo "Done.\n";
}
function sortBySeq($pt1, $pt2) { return $pt1->seq - $pt2->seq; } // utility for next function
function processShapeCoords($agency) {
	$shape_filename = $agency . "/shapes.txt";
	echo "processing $shape_filename\n";
	$shapeid_to_shapecoords = array();

	if (($shapes = fopen($shape_filename, "r")) === FALSE) {
		die("error opening $shape_filename");
	}

	$num = 1;
	$SHAPEID_INDEX = null;
	$LAT_INDEX = null;
	$LNG_INDEX = null;
	$SEQ_INDEX = null;

	while(($row = fgetcsv($shapes, 1000, ",")) !== FALSE) {
		if($num == 1) { 
			$SHAPEID_INDEX = array_search('shape_id', $row);
			$LAT_INDEX = array_search('shape_pt_lat', $row);
			$LNG_INDEX = array_search('shape_pt_lon', $row);
			$SEQ_INDEX = array_search('shape_pt_sequence', $row);
			
			echo "DEBUG: shape_id index = $SHAPEID_INDEX, shape_pt_lat index = $LAT_INDEX, ".
			     "shape_pt_lon index = $LNG_INDEX, shape_pt_sequence index = $SEQ_INDEX\n";
			$num++; continue;
		}

		$shapeid = $row[$SHAPEID_INDEX];
		$lat = floatval($row[$LAT_INDEX]);
		$lng = floatval($row[$LNG_INDEX]);
		$seq = intval($row[$SEQ_INDEX]);

		$point = new stdClass();
		$point->lat = $lat;
		$point->lng = $lng;
		$point->seq = $seq;
		addToArray($shapeid_to_shapecoords, $shapeid, $point);
	}
	fclose($shapes);

	echo "Sorting the shape data...\n";
	foreach($shapeid_to_shapecoords as $shapeid=>$points_arr) {
		usort($points_arr, 'sortBySeq');
	}
	echo "Done.\n";
	return $shapeid_to_shapecoords;
}
function processStopData($agency) {
	$stops_filename = $agency . "/stops.txt";
	echo "processing $stops_filename\n";

	if (($stops = fopen($stops_filename, "r")) === FALSE) {
		die("error opening $stops_filename");
	}
	
	$stop_data = array();
	$stop_data["BYCODE"] = array();
	$stop_data["BYID"] = array();
	
	$STOPID_INDEX = NULL;
	$STOPCODE_INDEX = NULL;
	$STOPNAME_INDEX = NULL;
	$LAT_INDEX = NULL;
	$LNG_INDEX = NULL;
	
	$num = 1;
	while(($row = fgetcsv($stops, 1000, ",")) !== FALSE) {
		if($num == 1) { 
			$STOPID_INDEX = array_search('stop_id', $row);
			$STOPCODE_INDEX = array_search('stop_code', $row);
			$STOPNAME_INDEX = array_search('stop_name', $row);
			$LAT_INDEX = array_search('stop_lat', $row);
			$LNG_INDEX = array_search('stop_lon', $row);
			
			
			echo "DEBUG: stop_id index = $STOPID_INDEX, stop_code index = $STOPCODE_INDEX, stop_name index = $STOPNAME_INDEX, ".
			     "stop_lat index = $LAT_INDEX, stop_lon index = $LNG_INDEX\n";
			$num++; continue;
		}

		$stopid = $row[$STOPID_INDEX];
		$stopcode = $row[$STOPID_INDEX]; // $row[$STOPCODE_INDEX]; // MARTA started putting random stuff in stop_code, they use stop_id.
		$name = $row[$STOPNAME_INDEX];
		$lat = $row[$LAT_INDEX];
		$lng = $row[$LNG_INDEX];

		$stopdata = new stdClass();
		//$stopdata->id = $stopid;
		$stopdata->stopcode = $stopcode;
		$stopdata->lat = $lat;
		$stopdata->lng = $lng;
		$stopdata->name = $name;
		$stop_data["BYCODE"][$stopcode] = $stopdata;
		$stop_data["BYID"][$stopid] = $stopdata;
	}
	fclose($stops);

	echo "Done.\n";
	return $stop_data;
}
function processRouteData($agency) {

	$routes_filename = $agency . "/routes.txt";
	echo "Processing $routes_filename\n";
	
	if (($routes = fopen($routes_filename, "r")) === FALSE) {
		die("error opening $routes_filename");
	}

	$route_data = array();
	$num = 1;
	while(($row = fgetcsv($routes, 1000, ",")) !== FALSE) {
		if($num == 1) { 
			$ROUTEID_INDEX = array_search('route_id', $row);
			$SHORTNAME_INDEX = array_search('route_short_name', $row);
			$LONGNAME_INDEX = array_search('route_long_name', $row);
			$ROUTECOLOR_INDEX = array_search('route_color', $row);
			$ROUTETEXTCOLOR_INDEX = array_search('route_text_color', $row);
			
			
			echo "DEBUG: route_id index = $ROUTEID_INDEX, route_short_name index = $SHORTNAME_INDEX, ".
			     "route_long_name index = $LONGNAME_INDEX, route_color index = $ROUTECOLOR_INDEX, ".
			     "route_text_color index = $ROUTETEXTCOLOR_INDEX\n";
			$num++; continue;
		}

		$routeid = $row[$ROUTEID_INDEX];
		$shortname = $row[$SHORTNAME_INDEX];
		$longname = $row[$LONGNAME_INDEX];
		$routecolor = $row[$ROUTECOLOR_INDEX];
		$routetextcolor = $row[$ROUTETEXTCOLOR_INDEX];

		$routedata = new stdClass();
		$routedata->routeid = $routeid;
		$routedata->shortname = $shortname;
		$routedata->longname = $longname;
		$routedata->routecolor = $routecolor;
		$routedata->routetextcolor = $routetextcolor;
		
		$route_data[$routeid] = $routedata;
	}
	fclose($routes);

	echo "Done.\n";
	return $route_data;
}

// MAIN
$agencies = array('MARTA', 'GRTA');

$BUSDATA = array();
foreach($agencies as $agency) {
	$BUSDATA[$agency] = generateDataForAgency($agency);
}

if(($busdatajs_file = fopen('busdata.js', 'w')) === FALSE) {
	die("Could not save busdata.js contents!");
} else {
	echo "Saving busdata.js JSON data...\n";
	fwrite($busdatajs_file, "var BUSDATA = ");
	fwrite($busdatajs_file, json_encode($BUSDATA));
	fwrite($busdatajs_file, ";\n");
	fclose($busdatajs_file);
	echo "Saved. Enjoy using busdata.js!\n";
}

?>


