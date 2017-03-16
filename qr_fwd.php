<!-- Example Usage: qr_fwd.php?s=MARTA_905384 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>MARTA Army OneBusAway Redirect</title>
	<style>
	body {text-align:center; font-family:sans-serif;}
	</style>
</head>

<?php
include('../../lib/db.php');
init_db();

function logScan($stopid) {
	global $_DB;
	
	$stmt = $_DB->prepare("INSERT into qr_tracker (stopid) VALUES (?)");
	$stmt->bind_param('s', $stopid);
	return $stmt->execute();
}

// URL forwarding parameters
$stopid_param = 's';
$targetUrlTemplate = 'http://atlanta.onebusaway.org/where/standard/stop.action?id=';
$bannerDuration = 2000; // milliseconds

if (isset($_REQUEST[$stopid_param]) && $_REQUEST[$stopid_param] != "") {
	
	$stopid = $_REQUEST[$stopid_param]; 
	$targetUrl = $targetUrlTemplate . $stopid;
	$shouldPrintError = !logScan($stopid);
	$errorMsg = $shouldPrintError ? "Encountered a minor problem logging your scan but we'll get you to your schedules." : "";
?>	
	<body onload="setTimeout(function() {window.location.replace('<?=$targetUrl ?>');}, <?=$bannerDuration ?>);">
		<h1><img src="img/timelytrip_black.jpg" alt="MARTA Army - Operation TimelyTrip" />
		<br/>Thank you, and have a good trip!</h1>
		<p>(<a href='$targetUrl'>Click here if you are not automatically redirected within 5 seconds.</a>)</p>
		<p><?=$errorMsg;?></p>
<?php
	$_DB->close();
}
else {
?>
	<body>
		<h1><img src="img/timelytrip_black.jpg" alt="MARTA Army - Operation TimelyTrip" />
		<br/>Join the action at <a href='http://www.martaarmy.org/'>MARTAarmy.org</a></h1>

<?php
}
?>

</body>
</html>
