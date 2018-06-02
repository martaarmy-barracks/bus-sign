<?php
include('../../ajax/get-json.php');
include('busdata/busdata.php');

date_default_timezone_set('America/New_York');
$default_effective_date = "14-Apr-2018";
$default_agency = "MARTA";
$timetableUrl = "http://barracks.martaarmy.org/ajax/get-schedule-for-stop.php"; // ?stopid=901230

$sid = $_REQUEST['sid'];
$qrcode_url = "http://barracks.martaarmy.org/admin/bus-sign/qr_fwd.php%3Fs=$sid%26d=$default_effective_date";
$shortStopId = explode("_", $sid)[1];

//$sids = $_REQUEST['sids'];


$signsToMake = array();

//for($i=0; $i<count($sids); $i++) {
//	$sign = new stdClass();
//	$sign->sid = $sids[$i];
//	$signsToMake[] = $sign;
//}

?>

<?php

foreach($signsToMake as $sign) {
//	pullDataForSign($sign);
//	printPageForStop($sign);
}

?>

<?php



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
	<link rel="stylesheet" type="text/css" href="mini.css"/>
	<title>MARTA Army | TimelyTrip</title>
</head>
<body ng-app="MA_Signs">
<img src="img/timelytrip_black.jpg" />
<h1>Your TimelyTrip stickers are ready!</h1>
<!--p>Cut out each sign, cover with packing tape, and tape around the corresponding bus stop pole,
at eye level, with the bar code visible when walking in the direction of closest traffic.</p-->



<div class="mini-sign" ng-controller="TimetableCtrl">
	<div class="stop-name">{{d.stop_name}}</div>
	<div class='QR-text'>CHECK BUS ARRIVALS</div>
	<div class='stopid'>{{d.stop_id}}//<?=$default_effective_date?></div>
	<img class='QR' src='qr.php?p=http://barracks.martaarmy.org/qr.php?s=MARTA_{{d.stop_id}}&t=mini&d=<?=$default_effective_date?>'/>
	<div class="buses">
	<div class='bus' ng-repeat="tt in d.ttByRoute">
			<div class='title MARTA'>
				<div class='places'>
					<h3 ng-repeat="r in tt.routes" class="routeid_{{r}}">{{r}}</h3>
					
					<div class='origin-destination'>{{tt.dest.toLowerCase()}}</div>
				</div>
			</div>
	</div>
</div>


<script type="text/javascript" src="../../jslib/angular.min.js"></script>
<script type="text/javascript" src="signs-options.js"></script>
<script type='text/javascript'>
var timetabledata = <?=$rawTimetables?>;

var defaultAgency = "MARTA";
var fullStopId = "<?=$sid?>";

function forEach(arr, callback) {
    if (arr != undefined) {
        for (var i = 0; i < arr.length; i++) {
            callback(arr[i]);
        }    
    }
}


</script>
</body>
</html>
