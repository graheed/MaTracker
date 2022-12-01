<?php
   $db_host = "127.0.0.1";
   $database   = 'mysql';
   $db_user = "root";
   $db_pass = "";
   $db_name = "LavonneS_Associates";
   
   
   
   $db = new PDO($database . ":host=" . $db_host . ';dbname=' . $db_name, $db_user, $db_password);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   ?>
