<?php
$default_effective_date = "14-Apr-2018";
$timetableUrl = "http://barracks.martaarmy.org/ajax/get-schedule-for-stop.php"; // ?stopid=901230

$sid = $_REQUEST['sid'];
$adopter = $_REQUEST['adopter'];
$qrcode_url = "http://barracks.martaarmy.org/qr.php%3Fs=$sid%26d=$default_effective_date";
$shortStopId = explode("_", $sid)[1];

function getRaw($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	$result=curl_exec($ch);
	curl_close($ch);
	return $result;
}
$rawTimetables = getRaw("$timetableUrl?stopid=$shortStopId");

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
    <script type="text/javascript" src="busdata/terminus.js"></script>
    <script type="text/javascript" src="busdata/routemarkers.js"></script>
    <script type="text/javascript" src="map.js"></script>

	<title>MARTA Army | TimelyTrip</title>
</head>
<body ng-app="MA_Signs">
<div ng-controller="MapOptionsCtrl">
	<button id="mapOptionsButton" ng-click="visible = true">Options</button>
	<div id="mapOptionsContainer" ng-show="visible">
		<div>Map Options <button ng-click="redraw()">Apply</button><button ng-click="visible = false">Close</button></div>
		<div id="anchorEditor">
			<div ng-repeat="arr in anchorVals">
				<button ng-repeat="v in arr" ng-click="activeMarker.anchor = v">&nbsp;</button>
			</div>
		</div>

		<table>
			<thead>
			<tr>
				<th>Place</th>
				<th>Lat</th>
				<th>Lon</th>
				<th>Marker</th>
				<th>Anchor</th>
				<th>Deg</th>
			</tr>
			</thead>
			<tbody>
				<tr ng-click="setActiveMarker(mapSettings.youAreHere)">
					<td>'You are here' Marker</td>
					<td></td>
					<td></td>
					<td></td>
					<td><input type="text" size="6" ng-model="mapSettings.youAreHere.anchor" /></td>
					
				</tr>
				<tr ng-repeat="sta in stations | filter: {connecting: true}" ng-click="setActiveMarker(sta)">
					<td><input type="text" ng-model="sta.name" /></td>
					<td></td>
					<td></td>
					<td></td>
					<td><input type="text" size="6" ng-model="sta.anchor" /></td>
				</tr>
				<tr ng-repeat="m in markers" ng-click="setActiveMarker(m)">
					<td><input type="checkbox" ng-model="m.show" /><input type="text" ng-model="m.s" /></td>
					<td><input type="text" size="6" ng-model="m.lat" /></td>
					<td><input type="text" size="6" ng-model="m.lon" /></td>
					<td><input type="checkbox" ng-model="m.dot" /></td>
					<td><input type="text" size="6" ng-model="m.anchor" /></td>
					<td><input type="text" size="2" ng-model="m.deg" /></td>
				</tr>
			</tbody>
		</table>

	</div>
</div>

<div class='page page12' id='page_{{d.stop_id}}' ng-controller="TimetableCtrl">
	<div class='header'>
		<img class='logo' src='img/timelytrip_white.png'/>
		<div class='header-content'>
			<h1 ng-bind="d.stop_name">Bus stop name</h1>
			<div class='info'>
				<p class='stopid'>Stop ID: <span ng-bind="d.stop_id"></span>
				<br/>Effective: <span><?=$default_effective_date?></span></p>
			</div>
		</div>
	</div>


	<div class='mapFold'>
		<div class='map-container' id='map_{{d.stop_id}}_{{d.orientation}}'></div>
	</div>
	<div class='buses'>
		<div class='bus' ng-repeat="tt in d.ttByRoute">
			<div class='title MARTA'>
				<div class='places'>
					<h3 ng-repeat="r in tt.routes" class="routeid_{{r}}">{{r}}</h3>
					
					<div class='origin-destination'>{{tt.dest.toLowerCase()}}</div>
					<button class='busMoveUpButton'>Move up</button>
					<input class="sizeField" type="text" size="4" onchange="$(this).parent().parent().parent().width($(this).val());" />
				</div>
			</div>
			<table class='schedule'>
				<tr>
					<th ng-repeat="t in tt.timetables">{{t.en}}<br/><span class="alt-lang">{{t.es}}</span></th>
				</tr>
				<tr>
					<td ng-repeat="t in tt.timetables">
						<ul>
						<li class="{{$index % 24 < 12 ? 'am':'pm'}}" ng-repeat="h in t.byHour track by $index" ng-if="h || tt.firstHour <= $index && $index < 23">
							<span>{{h.hr}}</span>
							<span ng-repeat="m in h.mins">:{{m}}</span>
						</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>

	<div class='footer'>
		<div class='disclaimer'>
			*Trip times are approximate, may change without notice, and may vary with road conditions, events, and holidays. Data provided by MARTA.
			<br /><span class='alt-lang'>*Los horarios son indicativos, pueden cambiar sin aviso previo y cambiar en funci&oacute;n de las condiciones de circulaci&oacute;n, eventos, y d&iacute;as festivos.</span> 
		</div>

		<div class="cell">
			<p class='adopter'>This stop has been adopted by <span class='adopterName'><?=$adopter?></span></p>
		</div>
		<div class="cell">
			<img class="army_signup" src="img/army_signup.png" />
		</div>
		<div class="cell" style="float:right;width:32%;">
			<img class='QR' src='qr.php?p=<?=$qrcode_url?>' title='<?=$qrcode_url?>'/>
			<div class='QR-text'><span class='big'><b>CHECK BUS STATUS &#x25BA;</b></span><br/>Scan here for real-time<br />arrivals on your phone.</div>
		</div>
		<div class="cell-cleanup"></div>			
	</div>
</div>


<script type="text/javascript" src="../../jslib/angular.min.js"></script>
<script type="text/javascript" src="signs-options.js"></script>
<script type='text/javascript'>
/*var timetabledata = {
	"stop_id": "901230", 
	"stop_name": "10TH ST NE @ PIEDMONT AVE NE", 
	"timetables": [
		{"route": "36", "route_id": "7656", "direction_id": "0", "dest": "AVONDALE STATION",
			"saturday": ["06:37:11","07:37:11","08:37:11","09:37:11","10:37:11","11:37:11","12:37:11","13:37:11","14:37:11","15:37:11","16:37:11","17:37:11","18:37:11","19:37:11","20:37:11"]},
		{"route": "36", "route_id": "7656", "direction_id": "0", "dest": "AVONDALE STATION",
			"sunday": ["06:37:11","07:37:11","08:37:11","09:37:11","10:37:11","11:37:11","12:37:11","13:37:11","14:37:11","15:37:11","16:37:11","17:37:11","18:37:11","19:37:11","20:37:11"]},
		{"route": "36", "route_id": "7656", "direction_id": "0", "dest": "AVONDALE STATION", 
			"weekday": ["05:57:11","06:37:11","07:17:11","07:57:11","08:37:11","09:17:11","09:57:11","10:37:11","11:17:11","11:57:11","12:37:11","13:17:11","13:57:11","14:37:11","15:17:11","15:57:44","16:37:44","17:17:44","17:57:44","18:37:11","19:17:11","19:57:11","20:37:11","21:17:11","21:57:11","22:37:11","23:17:11","23:57:11"]},
		{"route": "109", "route_id": "7693", "direction_id": "1", "dest": "GA STATE STATION", 
			"weekday": ["05:43:15","06:23:15","07:03:15","07:43:15","08:23:15","09:03:15","09:43:15","10:23:15","11:03:15","11:43:15","12:23:15","13:03:15","13:43:15","14:23:15","15:03:15","15:43:15","16:23:15","17:03:15","17:43:15","18:23:15","19:03:15","19:43:15","20:23:15","21:03:15","21:43:15","22:23:15","23:03:15"]}
	]
};
*/
var timetabledata = <?=$rawTimetables?>;

var defaultAgency = "MARTA";
var fullStopId = "<?=$sid?>";


$(document).ready( function() {
	
	$('.page').each(function() {
		adjustBoxes($(this));
		performLayout();
	});
	
	$('.waypoints').css("display", "inherit");
	$('.schedule').css("width", "100%");
	
	$('.busMoveUpButton').click(function() {
		$(this).parent().parent().parent().addClass('move-up');
		performLayout();
	});

	drawMaps();
});


function performLayout() {
	var containerWidth = 1100 - 2;
	$('.buses div.bus.move-up').each(function() {
		var elementToMove = $(this);				
		elementToMove.detach();
				
		$('.map-container').width('49%');				
				
		elementToMove.appendTo($('.mapFold'));
		elementToMove.width(containerWidth / 2 * 0.985);
		elementToMove.css("float", "right");
	});

	var bottomRowElements = $('.buses div.bus');
	var totalWidth = 0;
	var nElementsInRow = 0;
	bottomRowElements.each(function() {
		totalWidth += $(this).width();
		nElementsInRow++;
	});

	var idealBusWidth = containerWidth;
	if (nElementsInRow > 1) idealBusWidth = containerWidth / nElementsInRow;		
	var stretchRatio = containerWidth / totalWidth;

	var allBusWidthsAreLessThanIdeal = true;
	bottomRowElements.each(function() {
		if ($(this).width() > idealBusWidth) allBusWidthsAreLessThanIdeal = false;
	});
	
	bottomRowElements.each(function(i, e) {
		var new_w = idealBusWidth;
		
		if (!allBusWidthsAreLessThanIdeal) new_w = $(this).width() * stretchRatio;
		if (nElementsInRow == 1) new_w *= 0.998;
		if (nElementsInRow >= 2) new_w *= 0.985;
		
		$(this).width(new_w);
		
		if (nElementsInRow > 1 && i == nElementsInRow - 1) {
			$(this).css("float", "right");
		}
	});
}

function collectBusElementRows(element) {
	var totalWidth = 0;
	var result = {allItems: [], rows: []};
	var nLineReturns = 0;
	var prevItem = undefined;

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
	var containerHeight = 1697;
	var busRowData = collectBusElementRows(element);

 	var stopid = element[0].id;
 	var stopid_split = stopid.split("_");
	var agency = stopid_split[1];
	var stopid_str = stopid_split[2];

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
/*	if (busRowData.rows.length >= 2) {
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
*/
	
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
		$(el).children().remove();

		var mapid = $(el).attr('id');
		var mapid_parts = mapid.split('_');
		var agency = defaultAgency; //mapid_parts[1];
		var stopid = mapid_parts[1];
        var direction = mapid_parts[2];
		drawMapForStopId(mapid, agency, stopid, direction);
	});
}

</script>
</body>
</html>
