<?php

$host = "localhost";
$db= "invoice_system";
$username = "root";
$password = "";

$mysqli  = new mysqli(hostname:$host,password:$password,database:$db,username:$username);

if($mysqli->connect_errno){
    die("Connection is not done");
}
return $mysqli;