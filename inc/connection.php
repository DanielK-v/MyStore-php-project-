<?php
$hostName = "localhost";
$user = "root";
$localhostpassword = "";
$dataBase = "storedb";

$connection = new mysqli($hostName, $user, $localhostpassword, $dataBase);

if($connection -> connect_error){
  echo "Error, while connectiong to db";
}

//echo "Connected successfully... :)";
