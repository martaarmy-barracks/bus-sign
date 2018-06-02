<!-- Example Usage: qr_fwd.php?s=MARTA_905384 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to MARTA Army</title>
	<style>
	body {text-align:center; font-family:sans-serif;}
	</style>
</head>

<?php
include('../../lib/db.php');
init_db();

// URL forwarding parameters
$stopid_param = 's';
//$targetUrlTemplate = 'http://atlanta.onebusaway.org/where/standard/stop.action?id=';
$targetUrlTemplate = 'http://barracks.martaarmy.org/stopinfo.php?sid=';
$bannerDuration = 1500; // milliseconds


session_start();


function logScan($stopid) {
	global $_DB;
	
	$stmt = $_DB->prepare("INSERT into qr_tracker (stopid) VALUES (?)");
	$stmt->bind_param('s', $stopid);
	return $stmt->execute();
}

function setPrinted($stopid) {
	global $_DB;
	
	$stmt = $_DB->prepare("update adoptedstops a set a.dateprinted = now() where concat(case when a.agency is null or a.agency = '' then 'MARTA' else a.agency end,'_', a.stopid) = ?");
	$stmt->bind_param('s', $stopid);
	return $stmt->execute();
}

function setGiven($stopid) {
	global $_DB;
	
	$stmt = $_DB->prepare("update adoptedstops a set a.dategiven = now() where concat(case when a.agency is null or a.agency = '' then 'MARTA' else a.agency end,'_', a.stopid) = ?");
	$stmt->bind_param('s', $stopid);
	return $stmt->execute() | setAbandoned($stopid, 0);
}

function setAbandoned($stopid, $value) {
	global $_DB;
	
	$stmt = $_DB->prepare("update adoptedstops a set a.abandoned = ? where concat(case when a.agency is null or a.agency = '' then 'MARTA' else a.agency end,'_', a.stopid) = ?");
	$stmt->bind_param('ds', $value, $stopid);
	return $stmt->execute();
}

if (isset($_REQUEST[$stopid_param]) && $_REQUEST[$stopid_param] != "") {	
	$stopid = $_REQUEST[$stopid_param]; 

	if (isset($_SESSION['isMaster'])) {
		if (isset($_SESSION['scanAction'])) {
			$scanAction = $_SESSION['scanAction'];

			if ($scanAction == "SET_PRINTED_TODAY") {
				$shouldPrintError = !setPrinted($stopid);
				$msg = $shouldPrintError ? "Problem updating DatePrinted" : "Printed Today";
			}
			else if ($scanAction == "SET_GIVEN_TODAY") {
				$shouldPrintError = !setGiven($stopid);
				$msg = $shouldPrintError ? "Problem updating DateGiven" : "Given Today";
			}
			else if ($scanAction == "SET_PRINTEDANGIVEN_TODAY") {
				$shouldPrintError = !setPrinted($stopid);
				$shouldPrintError |= !setGiven($stopid);
				$msg = $shouldPrintError ? "Problem updating DateGiven" : "Printed/Given Today";
			}
			else if ($scanAction == "SET_ABANDONED") {
				$shouldPrintError = !setAbandoned($stopid, 1);
				$msg = $shouldPrintError ? "Problem updating Abandoned" : "Abandoned";
			}

?>	
		<body>
			<h1><?=$stopid?> =&gt; <?=$msg?></h1>
<?php

		} 
	} 
	else {
		$targetUrl = $targetUrlTemplate . $stopid;
		$shouldPrintError = !logScan($stopid);
		$errorMsg = $shouldPrintError ? "Encountered a minor problem logging your scan but we'll get you to your schedules." : "";

?>	
		<body onload="setTimeout(function() {window.location.replace('<?=$targetUrl ?>');}, <?=$bannerDuration ?>);">
			<h1><img src="img/timelytrip_black.jpg" alt="MARTA Army - Operation TimelyTrip" />
			<br/>Thank you!
			<br/>Real-time bus display brought to you by MARTA Army.</h1>
			<p>(<a href='$targetUrl'>Click here if you are not automatically redirected within 5 seconds.</a>)</p>
			<p><?=$errorMsg;?></p>
<?php
		$_DB->close();
	}
}
else {
?>
	<body>
		<h1><img src="img/timelytrip_black.jpg" alt="MARTA Army - Operation TimelyTrip" />
		<br/>Join the action at <a href='http://www.martaarmy.org/'>MARTAarmy.org</a>!</h1>

<?php
}
?>

</body>
</html>
