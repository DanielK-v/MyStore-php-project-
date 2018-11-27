<?php
require_once 'header.php';
require 'inc/connection.php';
require 'inc/helpers.php';

header('Content-Type: text/html; charset=utf-8');
$id = test_input( $_GET["id"] );
if( isset($_SESSION['userId']) ){
$prodCodeErr = "";
$connection->query("set NAMES utf8");
$result = $connection->query( "SELECT * FROM products WHERE prod_id = ". $id) or die($connection->error);

while($row = $result->fetch_assoc()){
  $prodName = $row["prod_name"];
  $prodDesc = $row["prod_desc"];
  $price_one = $row["price_1"];
  $price_two = $row["price_2"];
  $prodAmount = $row["prod_amount"];
  $prodCode = $row["prod_code"];
  $image = $row["image"];
}
$result->close();
require 'inc/editProductForm.php';
}else{
  echo "You need to be logged in to access this page!";
}
$connection->close();
 ?>