<?php

define("hostname", "localhost");
define("user", "root");
define("localhostpassword", "");
define("database", "storedb");

$connection = new mysqli(hostname, user, localhostpassword, database);

if($connection -> connect_error){
  echo "Error, while connectiong to db";
}

//echo "Connected successfully... :)";
