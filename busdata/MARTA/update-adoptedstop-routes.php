<?php
include('../../../../lib/db.php');
include('../../../../lib/admindb.php');
init_db();

if (redirectIfNotAdmin("../../../login.php")) exit();

$startTime = time();



function updateAdoptedStopRoutes() {
	global $_DB;

// For this query to work fast on bigrock hosting, create the following primary keys and indexes:
// - Make primary keys columns in applicable gtfs_ tables.
// - Add index to all primary key columns
// - Add index to table gtfs_stop_times based on stop_id AND trip_id.

/*
update adoptedstops aa inner join (
SELECT concat(',', GROUP_CONCAT(route_short_name SEPARATOR ','), ',') routes, stopid from (
	select distinct r.route_short_name, b.stopid from gtfs_trips t, gtfs_routes r, (
		SELECT a.stopid, st.trip_id FROM adoptedstops a, gtfs_stop_times st
		where st.stop_id = a.stopid
	) b
	where b.trip_id = t.trip_id
	and r.route_id = t.route_id    
) x
group by stopid
) c

on aa.stopid = c.stopid
set aa.routes = c.routes
*/

	$stmt = $_DB->prepare(
		"update adoptedstops aa inner join ( " .
		"SELECT concat(',', GROUP_CONCAT(route_short_name SEPARATOR ','), ',') routes, stopid from ( " .
		"	select distinct r.route_short_name, b.stopid from gtfs_trips t, gtfs_routes r, ( " .
		"		SELECT a.stopid, st.trip_id FROM adoptedstops a, gtfs_stop_times st " .
		"		where st.stop_id = a.stopid " .
		"	) b " .
		"	where b.trip_id = t.trip_id " .
		"	and r.route_id = t.route_id " .
		") x " .
		"group by stopid " .
		") c " .

		"on aa.stopid = c.stopid " .
		"set aa.routes = c.routes "
	);
	$result = $stmt->execute();

	if (!$result) return array("status" => "Execute failed: (" . $stmt->errno . ") " . $stmt->error);
	return array("status" => "success");
}

$r = updateAdoptedStopRoutes();

$duration = time() - $startTime;

// Print feedback below when operation is complete. 
?>
Adopted stop routes updated in <?=$duration?>s.
