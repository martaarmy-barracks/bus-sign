<?php
include('updater-params.php');
include('../../../../lib/db.php');
include('../../../../lib/admindb.php');
init_db();

if (redirectIfNotAdmin("../../../login.php")) exit();

$startTime = time();

// Download zip from MARTA website
file_put_contents($gtfsArchiveName, fopen($gtfsSourceUrl, 'r'));


$duration = time() - $startTime;


// Print feedback below when operation is complete. 
?>
GTFS Download Completed in <?=$duration?>s.