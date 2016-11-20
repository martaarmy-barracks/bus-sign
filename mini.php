<?php

include('busdata/busdata.php');

date_default_timezone_set('America/New_York');
$default_effective_date = "6-Aug-2016";
$color_index = 0;
$oneBusAwayServerAndPort = "atlanta.onebusaway.org/api";

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
	<link rel="stylesheet" type="text/css" href="mini.css"/>
	<title>MARTA Army | TimelyTrip</title>
</head>
<body>

<?php

foreach($signsToMake as $sign) {
	pullDataForSign($sign);
	printPageForStop($sign);
}

function pullDataForSign(&$sign) {
	global $oneBusAwayServerAndPort;

	$sid = $sign->sid; // MARTA_1444545
	
	$result = getJson("http://" . $oneBusAwayServerAndPort . "/api/where/schedule-for-stop/" . $sid . ".json?key=TEST&date=2016-08-19"); // weekday
	
	$sign->stopName = $result['data']['references']['stops'][0]['name'];
	$sign->travelDirection = $result['data']['references']['stops'][0]['direction'];
	
	// Hack if using the TRAPEZE SCHEDULER extract.
	//$sign->sid = 'MARTA_' . $result['data']['references']['stops'][0]['code'];
	
	$stopSchedules = array();
	$groupedSchedules = array();

	// get weekday schedules
	createSchedules($result, $stopSchedules, $groupedSchedules, 'wkday');

	// get saturday schedules
	$result = getJson("http://" . $oneBusAwayServerAndPort . "/api/where/schedule-for-stop/" . $sid . ".json?key=TEST&date=2016-08-20"); // saturday
	createSchedules($result, $stopSchedules, $groupedSchedules, 'sat');
	
	// get sunday schedules
	$result = getJson("http://" . $oneBusAwayServerAndPort . "/api/where/schedule-for-stop/" . $sid . ".json?key=TEST&date=2016-08-21"); // sunday
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
	$stopnum = explode('_', $stopid)[1];

	//printPageHeader($sign);


echo <<<EOT
	<div class="mini-sign">
		<div class="buses">
EOT;

	$groupedSchedules = $sign->groupedSchedules;
	foreach($groupedSchedules as $ss) {
		printRouteInfo($ss);
	}

echo <<<EOT
		</div>
		<div class='QR-text'>CHECK BUS ARRIVALS</div>
		<div class='stopid'>$stopnum</div>
		<img class='QR' src='qr.php?p=http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php?s=$stopid'/>
	</div>			
EOT;


echo <<<EOT
	<div class="mini-sign">
		<div class='QR-text'>CHECK BUS ARRIVALS</div>
		<div class='stopid'>$stopnum</div>
		<img class='QR' src='qr.php?p=http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php?s=$stopid'/>
		<div class="buses">
EOT;

	$groupedSchedules = $sign->groupedSchedules;
	foreach($groupedSchedules as $ss) {
		printRouteInfo($ss);
	}

echo <<<EOT
		</div>
	</div>			
EOT;
echo <<<EOT
	<div class="mini-sign">
		<div class='QR-text'>CHECK BUS ARRIVALS</div>
		<img class='QR' src='qr.php?p=http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php?s=$stopid'/>
	</div>			
	<div class="mini-sign">
		<div class='QR-text'>CHECK BUS ARRIVALS</div>
		<img class='QR' src='qr.php?p=http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php?s=$stopid'/>
	</div>			
	<div class="mini-sign">
		<div class='QR-text'>CHECK BUS ARRIVALS</div>
		<img class='QR' src='qr.php?p=http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php?s=$stopid'/>
	</div>			
	<div class="mini-sign">
		<div class='QR-text'>CHECK BUS ARRIVALS</div>
		<img class='QR' src='qr.php?p=http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php?s=$stopid'/>
	</div>			

EOT;

	//printPageHeader($sign);

	//echo "<div class='buses'>";

	
	//$groupedSchedules = $sign->groupedSchedules;
	//foreach($groupedSchedules as $ss) {		
	//	printRouteInfo($ss);
	//}

	//echo "</div>"; // </.buses>


	//printPageFooter($sign);
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
	//global $color_index;

	if (array_key_exists('routes', $routeInfo)) {
		for ($i = 0; $i < count($routeInfo['routes']); $i++) {
			$id_split = explode("_", array_keys($routeInfo['routeIds'])[$i])[1];
			
			$names = $names . '<h3 class="routeid_' . $id_split . '">' . array_keys($routeInfo['routes'])[$i] . '</h3>';
		}
	}
	$agency = $routeInfo['agency'];
	$destArray = explode(" via ", $routeInfo['direction2']);
	$originDestination = str_replace(". " , ".&nbsp;", str_replace(" to ", "&nbsp;&#x27A4;&nbsp;", $destArray[0]));

	$originDestination = $routeInfo['direction'];

echo <<<EOT
	<div class='bus'><div class='title $agency'>
		<div class='places'>
			$names
			<div class='origin-destination'>$originDestination</div>
		</div>
	</div>
EOT;

	echo "</div>";
}

?>

</body>
</html>
