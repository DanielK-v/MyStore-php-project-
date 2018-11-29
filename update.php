<?php
require 'inc/connection.php';
require 'inc/helpers.php';

$connection->query("SET NAMES utf8");

$allowedTypes = ["png", "jpeg", "jpg"];
$errors = array();
$msg;

//Update info for selected record
if( isset( $_POST["edit-product-btn"]) ){
  $updatedProdName = test_input( $_POST["edit-product-name"] );
  $updatedProdDesc = test_input( $_POST["edit-product-desc"] );
  $updatedPriceOne = test_input( $_POST["edit-price-first"] );
  $updatedPriceTwo = test_input( $_POST["edit-price-second"] );
  $updatedProdAmount = test_input( $_POST["edit-product-amount"] );
  $updatedProdCode = test_input( $_POST["edit-product-code"] );

  $target = "uploads/".baseName($_FILES['edit-product-image']['name']);
  $updatedImage = $_FILES['edit-product-image']['name'];
  if( move_uploaded_file( $_FILES['edit-product-image']['tmp_name'], $target ) ){
    $msg = "image uploaded!";
  }else{
    $msg = "There was an error!";
  }

  if(empty($errors)){
    $sql = "UPDATE products
    SET prod_name = '$updatedProdName',
        prod_desc = '$updatedProdDesc',
        price_1 = '$updatedPriceOne',
        price_2 = '$updatedPriceTwo',
        prod_amount = '$updatedProdAmount',
        prod_code = '$updatedProdCode',
        image = '$updatedImage'
    WHERE prod_id = ".test_input( $_GET["id"] );
  
  $connection->query( $sql ) or die( $connection->error );
  $connection->close();
  
  header("Location: index.php");
  }else{
    print_r($errors);
  }
  
}else {
  $errors["img"] = "<span id=\"prodCodeErr\" class=\"helper-text red-text \" data-error=\"wrong\" data-success=\"right\">Файлът, който се опитвате да качите не от тип png,jpeg или jpg!</span>";
}
