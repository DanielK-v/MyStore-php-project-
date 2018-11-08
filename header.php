<?php
session_start();
require 'inc/connection.php';
?>
<!DOCTYPE html>
<html lang="bg">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Моят Магазин</title>
</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<header>
  <nav>
    <div class="nav-wrapper teal lighten-2">
      <a  id="my-logo"href="index.php" class="brand-logo center">Моят Магазин</a>
      <ul id="navbar" class="right hide-on-med-and-down">
        <?php if( !isset( $_SESSION['userId'] ) && !isset( $_SESSION['username'] ) ){
          echo "<li><a href=\"signUp.php\">Регистрация</a></li>";
          echo "<li><a href=\"index.php\">Влез</a></li>";
        }else{
          echo "<li><a href=\"addProduct.php\">Добави продукт</a></li>";
          echo "<li><a href=\"logOut.php\">Излез</a></li>";
        }
         ?>
      </ul>
    </div>
  </nav>
  <?php 
  if(( !isset( $_SESSION["userId"] ) && !isset( $_SESSION["username"] ) ) ){
    echo "<ul id=\"slide-out\" class=\"sidenav\">
    <li><a href=\"signUp.php\" class=\"waves-effect\">Регистрация</a></li>
    <li><a class=\"waves-effect\" href=\"index.php\">Влез</a></li>
  </ul>
  <a href=\"#\" data-target=\"slide-out\" class=\"sidenav-trigger\"><i class=\"material-icons\">menu</i></a>";
  }else{
    echo "<ul id=\"slide-out\" class=\"sidenav\">
    <li><a href=\"addProduct.php\" class=\"waves-effect\">Добави продукт</a></li>
    <li><a class=\"waves-effect\" href=\"logOut.php\">Излез</a></li>
  </ul>
  <a href=\"#\" data-target=\"slide-out\" class=\"sidenav-trigger\"><i class=\"material-icons\">menu</i></a>";
  }
  
  ?>

</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.sidenav');
  var instances = M.Sidenav.init(elems);
});
</script>
