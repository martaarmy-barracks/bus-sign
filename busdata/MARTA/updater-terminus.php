<?php
include('updater-params.php');
include('../../../../lib/db.php');
include('../../../../lib/admindb.php');
init_db();

if (redirectIfNotAdmin("../../../login.php")) exit();

$startTime = time();

global $_DB;

$v = $_DB->query(
"update gtfs_trips t, gtfs_stop_times st, gtfs_stops s, " .
"(select trip_id, max(stop_sequence) sq from gtfs_stop_times group by trip_id) t1 " .
"set t.terminus_id = st.stop_id, t.terminus_name = s.stop_name " .
"where t.trip_id = t1.trip_id and st.stop_id = s.stop_id and t1.trip_id = st.trip_id and st.stop_sequence = t1.sq "
);
if (!$v) echo "Error populating terminus data.";


$v = $_DB->query(
"update gtfs_trips t, terminus_names tn " .
"set t.terminus_name = tn.stop_name " .
"where t.terminus_id = tn.stop_id "
);
if (!$v) echo "Error populating enhanced terminus names.";


$duration = time() - $startTime;

// Print feedback below when operation is complete. 
?>
Terminus Update Completed in <?=$duration?>s.