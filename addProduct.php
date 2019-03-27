<?php
require 'header.php';
require 'inc/helpers.php';

if( isset( $_SESSION['userId'] ) ){
  $prodCodeErr = "";
  $msg = "";
if( isset( $_POST['add-product-btn'] ) ){
  $productName = test_input( $_POST['product-name'] );
  $productDesc = test_input( $_POST['product-desc'] );
  $priceFirst = test_input( $_POST['price-first'] );
  $priceSecond = test_input( $_POST['price-second'] );
  $productAmount = test_input( $_POST['product-amount'] );
  $productCode = test_input( $_POST['product-code'] );
  $productCat = test_input( $_POST['product-cat'] );
  //Image of a product
  $target = "uploads/".baseName($_FILES['product-image']['name']);
  $image = $_FILES['product-image']['name'];
  if( move_uploaded_file( $_FILES['product-image']['tmp_name'], $target ) ){
    $msg = "image uploaded!";
  }
  //Check if the product code is unique
  $result = $connection->query("SELECT * FROM products WHERE prod_code = '$productCode'");

  if($result->num_rows > 0 ){
    $prodCodeErr = "<span id=\"prodCodeErr\" class=\"helper-text red-text \" data-error=\"wrong\" data-success=\"right\">Продуктовият код трябва да е уникален!</span>";
  }else{
        $chekedProdCode = $productCode;
      }

  $connection->query("SET NAMES utf8");  //Display Bulgarian words properly

  if( isset( $productName ) && isset( $priceFirst ) && isset( $priceSecond) && isset( $productAmount) && isset( $chekedProdCode) ){
    if( $stmt = $connection->prepare( "INSERT into products (cat_id,prod_name,prod_desc,price_1,price_2,prod_amount,prod_code,image) VALUES (?,?,?,?,?,?,?,?)" ) ){
      $stmt->bind_param( "issddiss", $productCat, $productName, $productDesc, $priceFirst, $priceSecond, $productAmount, $chekedProdCode, $image);
      $stmt->execute();
      $stmt->close();
      }
    $connection->close();
    header("Location: index.php");
  }
}

    require './inc/addProductForm.php';

  }else{
    echo "<div class=\"card-panel #ffcdd2 red lighten-4\"><h3>Трябва да сте регистрирани за да имате достъп до тази страница!</h3></div>
    <p>Пренасочване към форма за регистрация... </p>";
    header("refresh:3;url=signUp.php"); // redirecting the user to a SignUp.php
  }
?>
