<?php
include "phpqrcode/phpqrcode.php";
date_default_timezone_set('America/New_York');

$p = $_GET['p'];

QRcode::png($p, false, QR_ECLEVEL_L, 8, 1);

?>