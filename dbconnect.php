<?php
$host = "61.7.241.82" ;
$userr = "root";
$pwd = "KCOM789456" ;
$dbname = "line_notify";
$link = mysqli_connect($host, $userr, $pwd, $dbname);
mysqli_query($link, "SET NAMES utf8");
mysqli_query($link, "SET character_set_results=utf8");
mysqli_query($link, "SET character_set_client=utf8");
mysqli_query($link, "SET character_set_connection=utf8");
?>
