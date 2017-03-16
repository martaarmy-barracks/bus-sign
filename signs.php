<?php

include('busdata/busdata.php');

date_default_timezone_set('America/New_York');
$default_effective_date = "10-Dec-2016";
$weekday_query_date = "2017-01-09";
$saturday_query_date = "2017-01-14";
$sunday_query_date = "2017-01-15";
$color_index = 0;
$oneBusAwayServerAndPort = "atlanta.onebusaway.org/api"; //"localhost:8080";

$sids = $_REQUEST['sids'];
$adopters = $_REQUEST['adopters'];

//if(count($sids) != count($adopters)) {
//	die("Count of stop ids is not same as count of adopters!");
//}

$signsToMake = array();

//for($i=0; $i<count($sids); $i++) {
for($i=0; $i<1; $i++) {
	$sign = new stdClass();
	$sign->sid = $sids[$i];
	$sign->adopter = $adopters[$i];
	$signsToMake[] = $sign;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="army.css"/>
	<script type='text/javascript' src='jquery.js'></script>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.12.0/mapbox-gl.js'></script>
    <script type="text/javascript" src="busdata/busdata.js"></script>
    <script type="text/javascript" src="busdata/rail_bus.js"></script>
    <script type="text/javascript" src="busdata/transit_stations.js"></script>
    <script type="text/javascript" src="busdata/bus_terminus.js"></script>
    <script type="text/javascript" src="map.js"></script>

	<title>MARTA Army | TimelyTrip</title>
</head>
<body>

<?php

foreach($signsToMake as $sign) {
	pullDataForSign($sign);
	printPageForStop($sign);
}

function pullDataForSign(&$sign) {
	global $weekday_query_date;
	global $saturday_query_date;
	global $sunday_query_date;
	global $oneBusAwayServerAndPort;

	$sid = $sign->sid; // MARTA_1444545
	
	$result = getJson("http://" . $oneBusAwayServerAndPort . "/api/where/schedule-for-stop/" . $sid . ".json?key=TEST&date=" . $weekday_query_date); // weekday
	
	$sign->stopName = $result['data']['references']['stops'][0]['name'];
	$sign->travelDirection = $result['data']['references']['stops'][0]['direction'];
	
	// Hack if using the TRAPEZE SCHEDULER extract.
	//$sign->sid = 'MARTA_' . $result['data']['references']['stops'][0]['code'];
	
	$stopSchedules = array();
	$groupedSchedules = array();

	// get weekday schedules
	createSchedules($result, $stopSchedules, $groupedSchedules, 'wkday');

	// get saturday schedules
	$result = getJson("http://" . $oneBusAwayServerAndPort . "/api/where/schedule-for-stop/" . $sid . ".json?key=TEST&date=" . $saturday_query_date); // saturday
	createSchedules($result, $stopSchedules, $groupedSchedules, 'sat');
	
	// get sunday schedules
	$result = getJson("http://" . $oneBusAwayServerAndPort . "/api/where/schedule-for-stop/" . $sid . ".json?key=TEST&date" . $sunday_query_date); // sunday
	createSchedules($result, $stopSchedules, $groupedSchedules, 'sun');

	// Above we marked certain headsigns as "AMBIGUOUS"
	// b/c the same text might be used for multiple directions of travel.
	// Merge 'AMBIGUOUS' schedules with another schedule of the same route (e.g. MARTA 12).

	$deleteCandidates = array();		
	foreach ($groupedSchedules as $ss) {
		if ($ss['direction2'] == 'AMBIGUOUS') {
			foreach ($groupedSchedules as &$ss1) {
				if ($ss1['name'] == $ss['name'] && ($ss1['direction2'] != 'AMBIGUOUS')) {
					array_push($deleteCandidates, $ss);
					
					$ss1['wkday'] = array_merge($ss1['wkday'], $ss['wkday']);
					$ss1['sat'] = array_merge($ss1['sat'], $ss['sat']);
					$ss1['sun'] = array_merge($ss1['sun'], $ss['sun']);

					sort($ss1['wkday']);
					sort($ss1['sat']);
					sort($ss1['sun']);
					
					break;
				}
			}				
		}
	}

	foreach ($deleteCandidates as $dc) {
		unset($groupedSchedules[$dc['finalDestination']]);
	}


	$sign->stopSchedules = $stopSchedules;
	$sign->groupedSchedules = $groupedSchedules;
}

function getJson($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	$result=curl_exec($ch);
	curl_close($ch);
	return json_decode($result, true);
}

function createSchedules($result, &$stopSchedules, &$groupedSchedules, $day) {
	global $directionData;

	$rawSchedules = $result['data']['entry']['stopRouteSchedules'];
	$routes = $result['data']['references']['routes'];
	
	if (isset($rawSchedules)) {
		foreach($rawSchedules as $rawSch) {
			$routeId = $rawSch['routeId'];		
			
			foreach($rawSch['stopRouteDirectionSchedules'] as $rawSchDirn) {
			
				$rawHeadsign = $rawSchDirn['tripHeadsign'];
				$direction2Data = (array_key_exists($rawHeadsign, $directionData) ? $directionData[$rawHeadsign] : null);
				$direction2 = ''; // (array_key_exists($rawHeadsign, $directionData) ? $directionData[$rawHeadsign] : $rawHeadsign);
				$finalDestination = '';
				
				if ($direction2Data != null) {
						$directionSplit = explode(" via ", $direction2Data);
						$directionSplit = explode(" to ", $directionSplit[0]);
						$direction2 = $direction2Data;
						if (count($directionSplit) >= 2) {
							$finalDestination = $directionSplit[1];
						}
						else {
							$finalDestination = $directionSplit[0];							
						}
				}
				else {
					$direction2 = $finalDestination = $rawHeadsign;
				}
				$scheduleId = $routeId . "_" . $direction2;
				
				$stopSch = (array_key_exists($scheduleId, $stopSchedules) ? $stopSchedules[$scheduleId] : null);
				$groupedSch = (array_key_exists($finalDestination, $groupedSchedules) ? $groupedSchedules[$finalDestination] : null);
				if ($stopSch == null) {
					foreach($routes as $r) {
						if ($r['id'] == $routeId) {
							$stopSchedules[$scheduleId] = createRouteParams($r);				
							break;
						}
					}
				}
				if ($groupedSch == null) {
					foreach($routes as $r) {
						if ($r['id'] == $routeId) {
							$groupedSchedules[$finalDestination] = createRouteParams($r);				
							$groupedSchedules[$finalDestination]['direction2'] = $direction2;
							$groupedSchedules[$finalDestination]['finalDestination'] = $finalDestination;
							break;
						}
					}
				}

				foreach($routes as $r) {
					if ($r['id'] == $routeId) {
						$groupedSchedules[$finalDestination]['routes'][$r['shortName']] = $r['shortName'];
						$groupedSchedules[$finalDestination]['routeIds'][$routeId] = $routeId;
						if (count($groupedSchedules[$finalDestination]['routes']) > 1) {
							$groupedSchedules[$finalDestination]['direction2'] = " to " . $finalDestination;					
						}
					}
				}
				
				$stopSchedules[$scheduleId]['direction'] = $rawHeadsign; // todo stopRouteDirectionSchedules should only have one item in it		
				$stopSchedules[$scheduleId]['direction2'] = $direction2;

				$schedule = array();

				$arrTimes = $rawSchDirn['scheduleStopTimes']; 
				foreach($arrTimes as $at) {
					array_push($schedule, $at['departureTime']); // todo check for arrivalEnabled and departureEnabled
				}
				$stopSchedules[$scheduleId][$day] = $schedule;
				$groupedSchedules[$finalDestination][$day] = array_merge($groupedSchedules[$finalDestination][$day], $schedule);
				sort($groupedSchedules[$finalDestination][$day]);
			}
		}		
	}
}

function createRouteParams($r) {
	$route = array();

	$route['name'] = $r['shortName'];
	$route['agency'] = $r['agencyId'];		
	$route['direction'] = 'unknown';
	//$route['neighbourhoods'] = getNeighbourhoods($agency, $r['shortName'], $sid);
	$route['wkday'] = array();
	$route['sat'] = array();
	$route['sun'] = array();
	
	return $route;				
}

function printPageForStop($sign) {
	global $color_index;
	$color_index = 0;
	$stopid = $sign->sid . '_' . $sign->travelDirection;
 

	echo "<div class='page page12' id='page_$stopid'>";
	//echo "<div class='top-hole'>+</div>";


	printPageHeader($sign);

	echo "<div class='mapFold'>";
	echo "<div class='map-container' id='map_$stopid'></div>";
	echo "</div>";

	echo "<div class='buses'>";
	
	$groupedSchedules = $sign->groupedSchedules;
	foreach($groupedSchedules as $ss) {		
		printRouteInfo($ss);
	}

	echo "</div>"; // </.buses>
	
	printPageFooter($sign);
	echo "</div>"; // </.page>
	echo "<div style='clear:both; page-break-after: always;'></div>";
}

function printPageHeader($sign) {
	$sid = explode('_', $sign->sid)[1];
	$stopName = $sign->stopName;
	global $default_effective_date;
	$effDate = $default_effective_date;
	
	echo <<<EOT
	<div class='header'>
		<img class='logo' src='img/timelytrip_white.png'/>
		<div class='header-content'>
			<h1>$stopName</h1>		
			<div class='info'>
				<!--p class='verify'>
					<Check your bus departure times* from this stop.<br/>
					Verifica el horario* de su autobus en esta parada.
				</p-->
				<p class='stopid'>Stop ID: <span>$sid</span><br/>Effective: <span>$effDate</span></p>
			</div>
		</div>
	</div>
EOT;
}

function printRouteInfo($routeInfo) {
	$names = "";
	global $color_index;

	if (array_key_exists('routes', $routeInfo)) {
		for ($i = 0; $i < count($routeInfo['routes']); $i++) {
			$id_split = explode("_", array_keys($routeInfo['routeIds'])[$i])[1];
			
			$names = $names . '<h3 class="routeid_' . $id_split . '">' . array_keys($routeInfo['routes'])[$i] . '</h3>';
		}
	}
	$agency = $routeInfo['agency'];
	$destArray = explode(" via ", $routeInfo['direction2']);
	$originDestination = str_replace(". " , ".&nbsp;", str_replace(" to ", "&nbsp;&#x27A4;&nbsp;", $destArray[0]));

	$waypoints = "";
	if (count($destArray) > 1) {
		$waypoints = "<div class='waypoints'><i>via</i> " . $destArray[1] . "</div>";	
	}

	$bg_color_index = $color_index;
	if (count($routeInfo['routes']) > 1) $bg_color_index = 0;

	echo <<<EOT
	<div class='bus'><div class='title $agency'>
		<div class='places'>
			$names
			<div class='origin-destination'>$originDestination</div>
			$waypoints
		</div>
	</div>
EOT;

	$shouldPrintWeekday = (count($routeInfo['wkday']) > 0);
	$shouldPrintSaturday = (count($routeInfo['sat']) > 0);
	$shouldPrintSunday = (count($routeInfo['sun']) > 0);

	echo "		<table class='schedule'>";

	if ($routeInfo != null) {
		echo "<thead><tr>";

        $routeFirstHour = 24;
        if ($shouldPrintWeekday) $routeFirstHour = min($routeFirstHour, getFirstHour($routeInfo['wkday']));
        if ($shouldPrintSaturday) $routeFirstHour = min($routeFirstHour, getFirstHour($routeInfo['sat']));
        if ($shouldPrintSunday) $routeFirstHour = min($routeFirstHour, getFirstHour($routeInfo['sun']));
		
		if ($shouldPrintWeekday) echo '<th>Weekdays<br/><span class="alt-lang">En semana</span></th>';
		if ($shouldPrintSaturday) echo '<th>Saturday<br/><span class="alt-lang">S&aacute;bado</span></th>';
		if ($shouldPrintSunday) echo '<th>Sunday<br/><span class="alt-lang">Domingo</span></th>';
		
		echo "</tr></thead><tbody><tr>";
		if ($shouldPrintWeekday) {
			echo "<td><ul>";
			printTimeTable($routeInfo['wkday'], $routeFirstHour);
			echo "</ul></td>";
		}
		if ($shouldPrintSaturday) {
			echo "<td><ul>";
			printTimeTable($routeInfo['sat'], $routeFirstHour);
			echo "</ul></td>";
		}	
		if ($shouldPrintSunday) {
			echo "<td><ul>";
			printTimeTable($routeInfo['sun'], $routeFirstHour);
			echo "</ul></td>";
		}
		echo "</tr></tbody>";
	}
	else {
		echo "<thead></thead><tbody></tbody>";
	}
	echo "</table></div>";
}

function printTimeTable($tt, $firstHour) {
	$prevH = -1;
	$prevM = -1;
	$prevAMPM = 0;
	$first = true;
    $prevH = $firstHour - 1;

	foreach($tt as $t) {
		$t /= 1000;
		$h24 = intval(date('G', $t));
		$m = date('i', $t);
        $h = $h24;
		$am = true;
		if($h >= 12) { $am = false; }
		if($h > 12) { $h -= 12; }
		if($h == 0) {
			$h = 12;
			$am = true;
		}
        if ($h24 <= 3) $h24 += 24;

		$isNewHourRow = ($h24 != $prevH);
		if($isNewHourRow) {
			if($first) $first = false; 
			else echo "</li>";
	
            if ($prevH < $h24 - 1) {                
                for ($hmiss = $prevH+1; $hmiss < $h24; $hmiss++) {
                    $am2 = true;
                    $hmissed = $hmiss;
                    if($hmissed >= 12) { $am2 = false; }
                    if($hmissed > 12) { $hmissed -= 12; }
                    if($hmissed == 0) {
                        $hmissed = 12;
                        $am2 = true;
                    }
                        
                    $thisAMPM2 = $am2 ? 1 : 2; 
                    if ($thisAMPM2 != $prevAMPM) {
                        if($am2) echo "<li class='ampm-heading'>AM</li>";
                        else echo "<li class='ampm-heading'>PM</li>";
                    }
                                                        
                    echo "<li><span>&nbsp;</span>"; 
                    $prevAMPM = $thisAMPM2;
                }
            }
		
			$thisAMPM = $am ? 1 : 2; 
			if ($thisAMPM != $prevAMPM) {
				if($am) echo "<li class='ampm-heading'>AM</li>";
				else echo "<li class='ampm-heading'>PM</li>";
			}
			
			if ($am) echo "<li>"; 
			else echo "<li class=\"pm\">"; 
						
			echo "<span>$h</span>"; 
			$prevAMPM = $thisAMPM;
			$prevH = $h24;
        }
		
		if ($prevM != $m || $isNewHourRow) { // to avoid duplicate times (have to do from here not from timestamps)
			echo "<span>:$m</span>";
		}
		$prevM = $m;			
	}
	echo "</li>";
}

function getFirstHour($tt) {
    $t = $tt[0];

	$t /= 1000;
	$h = intval(date('G', $t));
       
    return $h;
}

function printPageFooter($sign) {
	$sid_full =  $sign->sid;
	$sid_split = explode('_', $sid_full);
	$agency_loc = $sid_split[0];
	$sid_loc = $sid_split[1];
	$adopter = $sign->adopter;

	global $default_effective_date;
	$qrcode_url = "http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php%3Fs=$sid_full%26d=$default_effective_date";

	echo <<<EOT
	<div class='footer'>
		<div class='disclaimer'>
			*Trip times are approximate, may change without notice, and may vary with road conditions, events, and holidays. Data provided by MARTA and OneBusAway.
			<br /><span class='alt-lang'>*Los horarios son indicativos, pueden cambiar sin aviso previo y cambiar en funci&oacute;n de las condiciones de circulaci&oacute;n, eventos, y d&iacute;as festivos.</span> 
		</div>

		<div class="cell">
			<p class='adopter'>This stop has been adopted by <span class='adopterName'>$adopter</span></p>
		</div>
		<div class="cell">
			<img class="army_signup" src="img/army_signup.png" />
		</div>
		<div class="cell" style="float:right;width:32%;">
			<img class='QR' src='qr.php?p=$qrcode_url' title='$qrcode_url'/>
			<div class='QR-text'><span class='big'><b>CHECK BUS STATUS &#x25BA;</b></span><br/>Scan here for real-time<br />arrivals on your phone.</div>
		</div>			
		<!--div class="bottom-hole">+</div-->
		<div class="cell-cleanup"></div>			
	</div>
EOT;
}

?>

<script type='text/javascript'>
$(document).ready( function() {
	
	$('.page').each(function() {
		adjustBoxes($(this));
	});
	
	$('.waypoints').css("display", "inherit");
	$('.schedule').css("width", "100%");
	
	drawMaps();

	//setTimeout(function(){ captureMaps(); }, 15000);

});

function collectBusElementRows(element) {
	var totalWidth = 0;
	var result = {allItems: [], rows: []};
	var nLineReturns = 0;
	var prevItem = undefined;

	//$('.buses div.bus').each(function() {

	element.find('.buses div.bus').each(function() {
		var $b = $(this);		
		totalWidth += $b.width();
	});

	element.find('.buses div.bus').each(function() {
		var $b = $(this);		
		var item = {element: $b, left: $b.offset().left, row: nLineReturns};
		result.allItems.push(item);
		
		if (prevItem != undefined && prevItem.left >= item.left) {
			nLineReturns++;
		}
		item.row = nLineReturns;
		
		if (result.rows[nLineReturns] == undefined) result.rows[nLineReturns] = [];
		result.rows[nLineReturns].push(item);

		if ($b.width() >= 0.6 * totalWidth) {
			nLineReturns++;
		}

		prevItem = item;
	});
	
	result.allItems.sort(function(a, b) {return a.element.width() - b.element.width();});
	return result;	
}

function adjustBoxes(element) {
	var containerWidth = 1100 - 2;
	var containerHeight = 1700;
	var busRowData = collectBusElementRows(element);

 	var stopid = element[0].id;
 	var stopid_split = stopid.split("_");
	var agency = stopid_split[1];
	var stopid_str = stopid_split[2];
 	//var routeids = BUSDATA[agency].stopid_to_routeids[stopid_str];

	//if (routeids != undefined) {
	//	for (var i = 0; i < routeids.length; i++) {
	//		var routeid_only = routeids[i].split("_")[0];
	//		element.find('.routeid_' + routeid_only).addClass('route' + (i + 1));
	//		element.find('.routeid_' + routeid_only).parent().parent().addClass('route' + (i + 1));
	//	}
	//}

	// Coloring without relying on BUSDATA.
	element.find("h3").each(function(index) {
			$(this).addClass('route' + (index + 1));
			$(this).parent().parent().addClass('route' + (index + 1));		
	});




	// OPTION1 Two or more rows: largest schedule may have to be on its own row. Let's put it last (easiest with code).
	//if (busRowData.rows.length >= 20) {
	//	var largestElement = busRowData.allItems[busRowData.allItems.length - 1].element;
	//	largestElement = largestElement.detach();
	//	largestElement.appendTo(element.find('.buses'));
	//	
	//	busRowData = collectBusElementRows(element);
	//}


	// OPTION2 Two rows: remove the local map and place a schedule that is within width next to map.
	if (busRowData.rows.length >= 2) {
		var elementToMove = undefined;
		for (var k = 0; k < busRowData.allItems.length - 1; k++) {
			if (busRowData.allItems[k].element.width() < (containerWidth / 2)) {
				elementToMove = busRowData.allItems[k].element;				
				elementToMove.detach();
				busRowData = collectBusElementRows(element);
				
				element.find('.map-container').width('49%');				
				
				elementToMove.appendTo(element.find('.mapFold'));
				elementToMove.width(containerWidth / 2 * 0.985);
				//elementToMove.width('49%');
				elementToMove.css("float", "right");
				
				break;
			}
		}
	}

	
	// Switch to 50% split if there is only one row.
	if (busRowData.rows.length == 1) {
		//element.css("font-size", "14.2pt");
		element.find(".bus table.schedule td ul").css("line-height", "1.3em");
	}	

	// Stretch to page width row by row
	for (var nrow = 0; nrow < busRowData.rows.length; nrow++) {
		var totalWidth = 0;
		var thisRow = busRowData.rows[nrow];
		var nElementsInRow = (thisRow != undefined ? thisRow.length : 0);

		var idealBusWidth = containerWidth;
		if (nElementsInRow > 1) idealBusWidth = containerWidth / nElementsInRow;		
		
		for (var k = 0; k < nElementsInRow; k++) {
			totalWidth += thisRow[k].element.width();
		}		
		if (totalWidth < containerWidth) {
			// if all bus widths are less than 1/n container width then set width to 1/n container width
			// else scale up.
			
			var allBusWidthsAreLessThanIdeal = true;
			for (var k = 0; k < nElementsInRow; k++) {
				if (thisRow[k].element.width() > idealBusWidth) allBusWidthsAreLessThanIdeal = false;
			}
			
			var stretchRatio = containerWidth / totalWidth;
			
			for (var k = 0; k < nElementsInRow; k++) {
					var $b = thisRow[k].element;
					var new_w = idealBusWidth;
					
					if (!allBusWidthsAreLessThanIdeal) new_w = $b.width() * stretchRatio;
					if (nElementsInRow == 1) new_w *= 0.998;
					if (nElementsInRow >= 2) new_w *= 0.985;
					
					$b.width(new_w);
					
					if (nElementsInRow > 1 && k == nElementsInRow - 1) {
						$b.css("float", "right");
					}
			}			
		}	
	}
		
	// Make heights equal, row by row.
	//for (var nrow = 0; nrow < busRowData.rows.length; nrow++) {
	//	var thisRow = busRowData.rows[nrow];
	//	var cmnHeight = 0;
	//	for (var k = 0; k < thisRow.length; k++) {
	//		var h = thisRow[k].element.height();
	//		if (h > cmnHeight) cmnHeight = h;					
	//	}
	//	for (var k = 0; k < thisRow.length; k++) {
	//		thisRow[k].element.height(cmnHeight);
	//	}			
	//}
}

function drawMaps() {
	$('.map-container').each(function(i,el) {
		var w0 = $(el).width();
		var h0 = $(el).height();
		
		//$(el).height('200%');
		//$(el).width('200%');

		var mapid = $(el).attr('id');
		var mapid_parts = mapid.split('_');
		var agency = mapid_parts[1];
		var stopid = mapid_parts[2];
        var direction = mapid_parts[3];
		drawMapForStopId(mapid, agency, stopid, direction);		
		
		//$(el).height(h0);
		//$(el).width(w0);
		
		//var canvas = $(el).find('.mapboxgl-canvas');
		//canvas.css("width", w0);
		//canvas.css("height", h0);
	});
}

</script>
</body>
</html>
