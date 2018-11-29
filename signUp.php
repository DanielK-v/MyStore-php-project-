<?php
require 'inc/connection.php';
require 'header.php';
require 'inc/helpers.php';

//Define errors
$errorPassword = "";
$errorPhone = "";
$errorUsername = "";
$errorEmail = "";

if( isset( $_POST["register"] ) ){
  $userName = "";
  $userEmail = "";
  $userPassword = "";
  $userPassword2 = "";
  $telephone = "";


  if( $_SERVER["REQUEST_METHOD"] == "POST" ){

    $userName = test_input( $_POST["username"] );
    $email  =  $_POST["email"];
    $userPassword = test_input( $_POST["password"] );
    $userPassword2 = test_input( $_POST["password2"] );
    $telephone = test_input( $_POST["phone"] );

    //Check passwords
    if( $userPassword != $userPassword2 ){
      $errorPassword = "<span id=\"errorPassword\"class=\"helper-text red-text \" data-error=\"wrong\" data-success=\"right\">Несъответствие на пароли!</span>";
    }elseif( !preg_match( '/^(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$userPassword ) ){
        $errorPassword = "<span id=\"errorPassword\"class=\"helper-text red-text \" data-error=\"wrong\" data-success=\"right\">Паролата трябва да съдържа поне една главна и една малка буква, и специален символ [@,-,_,~]</span>";
    }else{
      $checkedPassword = password_hash( $userPassword, PASSWORD_DEFAULT );
    }
  }

  // Check if email already exists
  $result = $connection->query("SELECT email FROM users WHERE email = '$email'");
 
  if( $result->num_rows > 0 ){
    $errorEmail = "<span id=\"errorEmail\" class=\"helper-text red-text \" data-error=\"wrong\" data-success=\"right\">Този email, вече съществува!</span>";
    $result->free();
  }elseif( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
    $errorEmail = "<span id=\"errorEmail\" class=\"helper-text red-text \" data-error=\"wrong\" data-success=\"right\">Невалиден email адрес!</span>";
    $result->free();
  }else{
    $checkedEmail = $email;
    $result->free();
  }

  // Check if username already exists
  $result = $connection->query( "SELECT username FROM users WHERE username = '$userName'" );
  if( $result->num_rows > 0 ){
    $errorUsername = "<span id=\"errorUsername\" class=\"helper-text red-text \" data-error=\"wrong\" data-success=\"right\">Това име, вече съществува!</span>";
    $result->free();
  }else{
    $checkedUserName = $userName;
    $result->free();
  }

  //Insert user into database
  if( isset( $checkedPassword ) && isset( $checkedEmail ) && isset( $checkedUserName ) ){
    if( $stmt = $connection->prepare( "INSERT into users (username,password,email,telephone) VALUES (?,?,?,?)" ) ){

      $stmt->bind_param( "ssss", $checkedUserName, $checkedPassword, $checkedEmail, $telephone );
      $stmt->execute();
      $stmt->close();
      }
    $connection->close();
    echo "<div class=\"card-panel #b9f6ca green accent-1\"><h3>Успешна Регистрация!</h3></div>";
    header( "refresh:2;url=index.php" ); //Redirect the user after 2 sec to index.php
    }
  }
  require 'inc/signUpForm.php';
 ?>

