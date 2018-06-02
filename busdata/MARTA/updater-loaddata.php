<?php
include('updater-params.php');
include('../../../../lib/db.php');
include('../../../../lib/admindb.php');
init_db();

if (redirectIfNotAdmin("../../../login.php")) exit();

$startTime = time();

function loadData($sourceTableName, $sourceCsv) {
    global $_DB;

    $v = $_DB->query("DELETE from $sourceTableName WHERE 1");
    if (!$v) echo "Error in truncating $sourceTableName";

    $v = $_DB->query("LOAD DATA LOCAL INFILE '" . $sourceCsv . "' INTO TABLE $sourceTableName FIELDS TERMINATED BY ',' IGNORE 1 LINES ");
    if (!$v)  echo "Error in loading $sourceCsv into $sourceTableName";
    
	return $v;
}

// Unzip archive into same directory.
$zip = new ZipArchive;
if ($zip->open($gtfsArchiveName) === TRUE) {
    $zip->extractTo('./');
    $zip->close();
    echo 'Unzip ok';
} else {
    echo 'Unzip failed';
}

// Load data into staging tables
loadData("gtfs_agency", "$gtfsDir/agency.txt");
loadData("gtfs_calendar", "$gtfsDir/calendar.txt");
loadData("gtfs_calendar_dates", "$gtfsDir/calendar_dates.txt");
loadData("gtfs_routes", "$gtfsDir/routes.txt");
loadData("gtfs_shapes", "$gtfsDir/shapes.txt");
loadData("gtfs_stop_times", "$gtfsDir/stop_times.txt");
loadData("gtfs_stops", "$gtfsDir/stops.txt");
loadData("gtfs_trips", "$gtfsDir/trips.txt");


$duration = time() - $startTime;


// Print feedback below when operation is complete. 
?>
GTFS Loading Completed in <?=$duration?>s.