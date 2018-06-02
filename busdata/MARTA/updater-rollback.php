<?php
include('updater-params.php');
include('../../../../lib/db.php');
include('../../../../lib/admindb.php');
init_db();

if (redirectIfNotAdmin("../../../login.php")) exit();

$startTime = time();

function rollbackTable($sourceTableName) {
    global $_DB;
    global $backupTableSuffix;
    
    $targetTableName = $sourceTableName . $backupTableSuffix;

    $v = $_DB->query("DELETE from $sourceTableName WHERE 1");
    if (!$v) echo "Error in truncating $sourceTableName";

    $v = $_DB->query("INSERT INTO $sourceTableName SELECT * FROM $targetTableName WHERE 1");
    if (!$v) echo "Error rolling back $sourceTableName";
    
	return $v;
}

// Rollback tables
rollbackTable("gtfs_agency");
rollbackTable("gtfs_calendar");
rollbackTable("gtfs_calendar_dates");
rollbackTable("gtfs_routes");
rollbackTable("gtfs_shapes");
rollbackTable("gtfs_stop_times");
rollbackTable("gtfs_stops");
rollbackTable("gtfs_trips");


$duration = time() - $startTime;


// Print feedback below when operation is complete. 
?>
GTFS Rollback Completed in <?=$duration?>s.