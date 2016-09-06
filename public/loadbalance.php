<?php

$hostname = "SQLSERVER_SGE";
$port = 1433;
$dbname = "sge_geo";
$username = "sge_geo";
$pw = "sgDbs1t3";

//try{
	$dbh = new PDO ("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
//}catch (PDOException $e){
//	echo "Failed to get DB handle: " . $e->getMessage() . "\n";
//    exit;
//}

echo "MNZ Tecnologia";
//unset($dbh);
?>