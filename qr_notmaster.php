<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>MARTA Army QR Master</title>
	<style>
	body {text-align:center; font-family:sans-serif;}
	</style>
</head>

	<body>
	<p>
		<?php
		session_start();

		if (isset($_SESSION['isMaster'])) {
			echo "Regular page! ";
			if (isset($_SESSION['isMaster'])) {
				echo "Master = " . $_SESSION['isMaster'];
			} 
			if (isset($_SESSION['scanAction'])) {
				echo "Scan Action = " . $_SESSION['scanAction'];
			} 
		}
		else {
			echo "<p>This is a regular session from a regular page!</p>";
		}
		?>	
		
	</p>		
	</body>
</html>
