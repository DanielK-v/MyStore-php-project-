<?php
require_once 'header.php';
require 'inc/connection.php';
require 'inc/helpers.php';

$prodCodeErr = "";

$connection->query("set NAMES utf8");
$result = $connection->query( "SELECT * FROM products WHERE prod_id = ".test_input( $_GET['id'] )) or die($connection->error);

while($row = $result->fetch_assoc()){
  $prodName = $row["prod_name"];
  $prodDesc = $row["prod_desc"];
  $price_one = $row["price_1"];
  $price_two = $row["price_2"];
  $prodAmount = $row["prod_amount"];
  $prodCode = $row["prod_code"];
}
$result->close();
 ?>

 <script type="text/javascript" src="inc/scripts/addProductSrc.js"></script>
 <div class="container">
   <div class="card">
     <form class="col s6" method="post" action="addProduct.php" enctype="multipart/form-data">

         <div class="input-field col s6">
           <input id="product-name" type="text" class="validate" name="product-name" maxlength="50" value=<?php echo $prodName?> required>
           <label for="product-name">Продукт</label>
         </div>

         <div class="input-field col s6">
           <textarea id="product-desc" class="materialize-textarea" name="product-desc"><?php echo $prodDesc?></textarea>
           <label for="product-desc">Описание на продукт</label>
         </div>

          <div class="input-field col s6">
             <input id="price-first" type="number" class="validate" name="price-first" min="0" step="any" value=<?php echo $price_one?> required>
             <label for="price-first">Цена на закупуване</label>
          </div>

          <div class="input-field col s6">
             <input id="price-second" type="number" class="validate" name="price-second" min="0" step="any" value=<?php echo $price_two?> required>
             <label for="price-second">Цена на продаване</label>
          </div>

          <div class="input-field col s6">
             <input id="product-amount" type="number" class="validate" name="product-amount" min="0" step="1" value=<?php echo $prodAmount?> required>
             <label for="product-amount">Количество</label>
          </div>

          <div class="input-field col s6">
            <input id="product-code" type="text" class="validate" name="product-code" maxlength="10" value=<?php echo $prodCode?> required>
            <label for="product-code">Код на продукт</label>
            <?php echo $prodCodeErr;  ?>
          </div>

          <div class="input-field col s12 m6">
            <select id="product-cat" class="icons" name="product-cat">
              <option value="" disabled selected>&nbsp;&nbsp;Избери категория</option>
              <option value="1" data-icon="inc/images/food.png">Хранителни стоки</option>
              <option value="2" data-icon="inc/images/house.png">Строителни материали</option>
              <option value="3" data-icon="inc/images/pen.png">Канцеларски стоки</option>
            </select>
          </div>

          <div class="input-field left-align">
            <input type="file" name="product-image" id="product-image">
          </div>

        </div>

      <div class="center-align">
        <button id ="add-product-btn"class="btn waves-effect waves-light" type="submit" name="add-product-btn">
          <i class="material-icons right">edit</i> Промени запис
        </button>
      </div>
     </form>
   </div>