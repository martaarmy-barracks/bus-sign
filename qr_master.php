<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MARTA Army QR Master</title>
	<style>
	body {text-align:center; font-family:sans-serif;}
	input, select {font-size: 150%;}
	#logout-form {position:absolute; bottom: 0; width:100%;}
	</style>
</head>

<?php
session_start();
?>	

	<body>
		<p><img src="img/timelytrip_black.jpg" alt="MARTA Army - Operation TimelyTrip" /></p>
		<p>Session info: 

<?php
if (isset($_REQUEST['scanAction'])) {
	$_SESSION['isMaster'] = true;
	$_SESSION['scanAction'] = $_REQUEST['scanAction'];
} 
if (isset($_SESSION['isMaster'])) {
	echo "Master = " . $_SESSION['isMaster'];
} 
if (isset($_SESSION['scanAction'])) {
	echo "Scan Action = " . $_SESSION['scanAction'];
} 
?>	
		</p>

		<form action="qr_master.php">
			<select name="scanAction">
				<option>SET_PRINTED_TODAY</option>
				<option>SET_GIVEN_TODAY</option>
				<option>SET_PRINTEDANGIVEN_TODAY</option>
				<option>SET_ABANDONED</option>
			</select>

			<input type="submit" value="Apply" />
		</form>


		<form id="logout-form" action="qr_master_logout.php">
			<input type="submit" value="Logout" />
		</form>
		
	</body>
</html>
