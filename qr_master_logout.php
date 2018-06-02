<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MARTA Army QR Master</title>
	<style>
	body {text-align:center; font-family:sans-serif;}
	</style>
</head>

<?php
session_start();
unset($_SESSION['isMaster']);
unset($_SESSION['scanAction']);
?>	

	<body>
		<h1>You have been logged out.</h1>

		<p>Session flag: 

<?php
if (isset($_SESSION['isMaster'])) echo $_SESSION['isMaster'];
?>	
		</p>
		
	</body>
</html>
