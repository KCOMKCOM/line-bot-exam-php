<?php
$Setup_Server = "61.7.241.70";
$Setup_User = "root";
$Setup_Pwd = "KCOM789456" ;
$Setup_Database = "line_notify";
mysql_connect($Setup_Server,$Setup_User,$Setup_Pwd);
mysql_query("use $Setup_Database");
mysql_query("SET NAMES UTF8");
?>
