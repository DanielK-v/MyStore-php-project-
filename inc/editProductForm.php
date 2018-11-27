<script type="text/javascript" src="inc/scripts/editProductSrc.js"></script>
 <div class="container">
   <div class="card">
     <form class="col s6" method="post" action=<?php echo"update.php?id=".urlEncode($id);?> enctype="multipart/form-data">

         <div class="input-field col s6">
           <input id="edit-product-name" type="text" class="validate" name="edit-product-name" maxlength="50" value=<?php echo $prodName?> required>
           <label for="edit-product-name">Продукт</label>
         </div>

         <div class="input-field col s6">
           <textarea id="edit-product-desc" class="materialize-textarea" name="edit-product-desc"><?php echo $prodDesc?></textarea>
           <label for="edit-product-desc">Описание на продукт</label>
         </div>

          <div class="input-field col s6">
             <input id="edit-price-first" type="number" class="validate" name="edit-price-first" min="0" step="any" value=<?php echo $price_one?> required>
             <label for="edit-price-first">Цена на закупуване</label>
          </div>

          <div class="input-field col s6">
             <input id="edit-price-second" type="number" class="validate" name="edit-price-second" min="0" step="any" value=<?php echo $price_two?> required>
             <label for="edit-price-second">Цена на продаване</label>
          </div>

          <div class="input-field col s6">
             <input id="edit-product-amount" type="number" class="validate" name="edit-product-amount" min="0" step="1" value=<?php echo $prodAmount?> required>
             <label for="product-amount">Количество</label>
          </div>

          <div class="input-field col s6">
            <input id="edit-product-code" type="text" class="validate" name="edit-product-code" maxlength="10" value=<?php echo $prodCode?> required>
            <label for="edit-product-code">Код на продукт</label>
            <?php echo $prodCodeErr;  ?>
          </div>

          <div class="input-field col s12 m6">
            <select id="edit-product-cat" class="icons" name="edit-product-cat">
              <option value="" disabled selected>&nbsp;&nbsp;Избери категория</option>
              <option value="1" data-icon="inc/images/food.png">Хранителни стоки</option>
              <option value="2" data-icon="inc/images/house.png">Строителни материали</option>
              <option value="3" data-icon="inc/images/pen.png">Канцеларски стоки</option>
            </select>
          </div>

          <div class="input-field left-align">
            <input type="file" name="edit-product-image" id="edit-product-image">
          </div>

        </div>

      <div class="center-align">
        <button id ="edit-product-btn"class="btn waves-effect waves-light #b71c1c red darken-4" type="submit" name="edit-product-btn">
          <i class="material-icons right">edit</i> Промени запис
        </button>
      </div>
     </form>
   </div>