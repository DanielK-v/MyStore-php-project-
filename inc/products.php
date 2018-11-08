<?php
header('Content-Type: text/html; charset=utf-8');
require 'connection.php';
$searchSQL="";
require 'searchBar.php';
?>

<div class="container" id="prod_table">
    <table class="highlight responsive-table">
        <tr class="header">
            <td><h5>Продукт</h5></td>
            <td><h5>Описание на продукт</h5></td>
            <td><h5>Цена на закупуване</h5></td>
            <td><h5>Цена на продаване</h5></td>
            <td><h5>Брой продукти</h5></td>
            <td><h5>Категория</h5></td>
            <td><h5>Код</h5></td>
            <td><h5>Снимка</h5></td>
        </tr>

    <?php
    if( isset( $_POST["searchBtn"] ) ){
        $userSearch = test_input($_POST["search-field"]);
    }
    
    //Setting encoding to utf8 so that Bulgarian words can be displayed correctly!
    $connection->query("set NAMES utf8");
    $sql = "SELECT products.prod_id,products.prod_name, products.prod_desc, products.price_1, products.price_2, products.prod_amount, products.prod_code,products.image, categories.cat_name
            FROM products
            INNER JOIN categories
            ON products.cat_id = categories.cat_id
            ORDER BY products.prod_id DESC";
    $result = $connection->query($sql) or die($connection->error);

    if(isset($userSearch)){
        //Displaying searched results
        $sql = "SELECT * FROM `products` INNER JOIN categories  WHERE prod_code LIKE '%$userSearch%'";
        $result = $connection->query($sql) or die($connection->error);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["prod_name"]."</td>";
            echo "<td>".$row["prod_desc"]."</td>";
            echo "<td>".$row["price_1"]." лв."."</td>";
            echo "<td>".$row["price_2"]." лв."."</td>";
            echo "<td>".$row["prod_amount"]."</td>";
            echo "<td>".$row["cat_name"]."</td>";
            echo "<td>".$row["prod_code"]."</td>";
            echo "<td> <img src=\"uploads/".$row["image"]."\"width=\"30rem \"height=\"30rem\"></td>";
            echo "<td><button id=deleteBtn".$row["prod_id"]." type=\"submit\" formmethod=\"get\"><i class=\"small material-icons\">delete</i></button></td>";
            echo "<td><button id=editBtn".$row["prod_id"]." type=\"submit\" formmethod=\"get\"><i class=\"small material-icons\">edit</i></button></td>";
            echo "</tr>";
        }
        $result->close();
        
    }else{
        //Displaying all results
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["prod_name"]."</td>";
            echo "<td>".$row["prod_desc"]."</td>";
            echo "<td>".$row["price_1"]." лв."."</td>";
            echo "<td>".$row["price_2"]." лв."."</td>";
            echo "<td>".$row["prod_amount"]."</td>";
            echo "<td>".$row["cat_name"]."</td>";
            echo "<td>".$row["prod_code"]."</td>";
            echo "<td> <img src=\"uploads/".$row["image"]."\"width=\"30rem \"height=\"30rem\"></td>";
            echo "<td><button id=deleteBtn".$row["prod_id"]." type=\"submit\" formmethod=\"get\"><i class=\"small material-icons\">delete</i></button></td>";
            echo "<td><button id=editBtn".$row["prod_id"]." type=\"submit\" formmethod=\"get\"><i class=\"small material-icons\">edit</i></button></td>";
            echo "</tr>";
        }
        $result->close();
        }
        $connection->close();
    ?>
    </table>
</div>
