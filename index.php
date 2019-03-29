<?php
require 'header.php';
require 'inc/helpers.php';

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/log.txt');

$errorLogin = "";
$login = "";

if (isset($_POST["login-btn"])) {

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $login = test_input($_POST["login-username"]);
        $psw = test_input($_POST["login-password"]);
    }

    if (!empty($login) || !empty($psw)) {
        $sql = "SELECT * FROM users";
        $result = $connection->query($sql);

        if ($result != $connection->query($sql)) {
            echo "There was an error with the sql!";
            exit();
        }
        ;

        foreach ($result as $row) {
            if ($row['username'] == $login && password_verify($psw, $row['password'])) {
                $_SESSION['userId'] = $row["id"];
                $_SESSION['username'] = $row['username'];
                $_SESSION['login-username'] = $login;
                $_SESSION['login-psw'] = $psw;
                header("Location: index.php?login=success");
                exit();
            }
        }
        if (empty($_SESSION['userId'])) {
            $errorLogin = "<span id=\"prodCodeErr\" class=\"helper-text red-text \" data-error=\"wrong\" data-success=\"right\">Грешна парола или потребителско име!</span>";
        }
    }
}

?>
   <body>
     <?php
if (isset($_SESSION['userId'])) {
    require 'inc/products.php';
} else {
    require 'inc/login.php';
}
?>
   </body>
 </html>
