<?php

include('busdata/busdata.php');

date_default_timezone_set('America/New_York');
$default_effective_date = "10-Dec-2016";
$color_index = 0;
$oneBusAwayServerAndPort = "atlanta.onebusaway.org/api";

$sids = $_REQUEST['sids'];
//$adopters = $_REQUEST['adopters'];

//if(count($sids) != count($adopters)) {
//	die("Count of stop ids is not same as count of adopters!");
//}

$signsToMake = array();

for($i=0; $i<count($sids); $i++) { //for($i=0; $i<1; $i++) {
	$sign = new stdClass();
	$sign->sid = $sids[$i];
	//$sign->adopter = $adopters[$i];
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
<img src="img/timelytrip_black.jpg" />
<h1>Your TimelyTrip stickers are ready!</h1>
<p>Cut out each sign, cover with packing tape, and tape around the corresponding bus stop pole,
at eye level, with the bar code visible when walking in the direction of closest traffic.</p>

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

	// get weekday schedules
	createSchedules($result, $stopSchedules, 'wkday');

	// get saturday schedules
	$result = getJson("http://" . $oneBusAwayServerAndPort . "/api/where/schedule-for-stop/" . $sid . ".json?key=TEST&date=2016-08-20"); // saturday
	createSchedules($result, $stopSchedules, 'sat');
	
	// get sunday schedules
	$result = getJson("http://" . $oneBusAwayServerAndPort . "/api/where/schedule-for-stop/" . $sid . ".json?key=TEST&date=2016-08-21"); // sunday
	createSchedules($result, $stopSchedules, 'sun');

	$sign->stopSchedules = $stopSchedules;
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

function createSchedules($result, &$stopSchedules, $day) {
	global $directionData;

	$rawSchedules = $result['data']['entry']['stopRouteSchedules'];
	$routes = $result['data']['references']['routes'];
	
	if (isset($rawSchedules)) {
		foreach($rawSchedules as $rawSch) {
			$routeId = $rawSch['routeId'];		
			
			foreach($rawSch['stopRouteDirectionSchedules'] as $rawSchDirn) {
			
				$rawHeadsign = $rawSchDirn['tripHeadsign'];
				$pattern = '/Route\s+\w+\s*-?\s*/';
				$matches = array();
				preg_match($pattern, $rawHeadsign, $matches);

				$finalDestination = $rawHeadsign;
				if (count($matches) > 0) {
					$finalDestination = substr($rawHeadsign, strlen($matches[0]));
				}

				$finalDestination = str_replace(" Station", "", $finalDestination);
				$scheduleId = $routeId . "_" . $rawHeadsign;
				
				$stopSch = (array_key_exists($scheduleId, $stopSchedules) ? $stopSchedules[$scheduleId] : null);
				if ($stopSch == null) {
					foreach($routes as $r) {
						if ($r['id'] == $routeId) {
							$stopSchedules[$scheduleId] = createRouteParams($r);				
							break;
						}
					}
				}
				foreach($routes as $r) {
					if ($r['id'] == $routeId) {
						$stopSchedules[$scheduleId]['routes'][$r['shortName']] = $r['shortName'];
						$stopSchedules[$scheduleId]['routeIds'][$routeId] = $routeId;
					}
				}
				
				$stopSchedules[$scheduleId]['direction'] = $finalDestination;
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
	global $default_effective_date;
	$color_index = 0;
	$stopname = $sign->stopName;
	//$stopid = $sign->sid . '_' . $sign->travelDirection;
	$stopid = $sign->sid;
	$stopnum = explode('_', $stopid)[1];

/*
echo <<<EOT
	<div class="mini-sign">
		<div class="stop-name">$stopname</div>
		<div class="buses">
EOT;

	$stopSchedules = $sign->stopSchedules;
	foreach($stopSchedules as $ss) {
		printRouteInfo($ss);
	}

echo <<<EOT
		</div>
		<div class='QR-text'>CHECK BUS ARRIVALS</div>
		<div class='stopid'>$stopnum $default_effective_date</div>
		<img class='QR' src='qr.php?p=http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php?s=$stopid&t=mini'/>
	</div>			
EOT;
*/

echo <<<EOT
	<div class="mini-sign">
		<div class="stop-name">$stopname</div>
		<div class='QR-text'>CHECK BUS ARRIVALS</div>
		<div class='stopid'>$stopnum $default_effective_date</div>
		<img class='QR' src='qr.php?p=http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php?s=$stopid&t=mini'/>
		<div class="buses">
EOT;

	$stopSchedules = $sign->stopSchedules;
	foreach($stopSchedules as $ss) {
		printRouteInfo($ss);
	}

echo <<<EOT
		</div>
	</div>			
EOT;
/* echo <<<EOT
	<div class="mini-sign">
		<div class="stop-name">$stopname</div>
		<div class='QR-text'>CHECK BUS ARRIVALS</div>
		<img class='QR' src='qr.php?p=http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php?s=$stopid'/>
	</div>			
	<div class="mini-sign">
		<div class="stop-name">$stopname</div>
		<div class='QR-text'>CHECK BUS ARRIVALS</div>
		<img class='QR' src='qr.php?p=http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php?s=$stopid'/>
	</div>			
	<div class="mini-sign">
		<div class="stop-name">$stopname</div>
		<div class='QR-text'>CHECK BUS ARRIVALS</div>
		<img class='QR' src='qr.php?p=http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php?s=$stopid'/>
	</div>			
	<div class="mini-sign">
		<div class="stop-name">$stopname</div>
		<div class='QR-text'>CHECK BUS ARRIVALS</div>
		<img class='QR' src='qr.php?p=http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php?s=$stopid'/>
	</div>			

EOT;
*/
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
