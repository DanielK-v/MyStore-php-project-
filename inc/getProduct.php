<?php
//require 'helpers.php';
require 'connection.php';

if(isset($_GET['q'])){
  $q = test_input($_GET['q']);

  $result = $connection->query( "SELECT products.prod_id,products.prod_name, products.prod_desc, products.price_1, products.price_2, products.prod_amount, products.prod_code,products.image_type, products.image_data, categories.cat_name
                                FROM products
                                INNER JOIN categories
                                ON products.cat_id = categories.cat_id
                                WHERE prod_code = $q
                                ORDER BY products.prod_id " ) or die($connection->error);

  echo"<div class=\"container\" id=\"prod_table\">
    <table class=\"highlight responsive-table\">
        <tr class=\"header\">
            <td><h5>Продукт</h5></td>
            <td><h5>Описание на продукт</h5></td>
            <td><h5>Цена на закупуване</h5></td>
            <td><h5>Цена на продаване</h5></td>
            <td><h5>Брой продукти</h5></td>
            <td><h5>Категория</h5></td>
            <td><h5>Код</h5></td>
        </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["prod_name"]."</td>";
            echo "<td>".$row["prod_desc"]."</td>";
            echo "<td>".$row["price_1"]."</td>";
            echo "<td>".$row["price_2"]."</td>";
            echo "<td>".$row["prod_amount"]."</td>";
            echo "<td>".$row["cat_name"]."</td>";
            echo "<td>".$row["prod_code"]."</td>";
            //echo "<td><i class=\"small material-icons\">delete</i></td>";
            //echo "<td><i class=\"small material-icons\">edit</i></td>";
           // echo "<td><a target=\"_blank\" src=".."</td>";
            echo "</tr>";
          }
          echo"</table></div>";
  $connection->close();
}else{
  $q = "1234";
}



 ?>
