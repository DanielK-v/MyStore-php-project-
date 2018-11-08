<?php
require 'inc/connection.php';
$connection->query("DELETE FROM products WHERE prod_id = ".$_GET["id"]);

if($connection){
  header("Location: index.php");
}else{
  die($connection->error);
}

?>
