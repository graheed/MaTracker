<?php
$db_host = "127.0.0.1";
$database   = 'mysql';
$db_user = "root";
$db_pass = "";
$db_name = "LavonneS_Associates";

#$conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
#$db = new PDO("mysql:host=$db_host,dbname= $db_name", $db_user, $db_pass);
#$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
#$conn = mysqli_connect("127.0.0.1", "root", "", $db_name);
#if (!$conn) {
    #die("Connection failed: " . mysqli_connect_error());
  #}
  #echo "Connected successfully";

$db = new PDO($database . ":host=" . $db_host . ';dbname=' . $db_name, $db_user, $db_password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>