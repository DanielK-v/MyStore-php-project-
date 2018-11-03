<div class="container">
    <form class="col s6" method="post" action="index.php">
      
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="login-username" type="text" class="validate" name="login-username" minlength="5" maxlength="15" required>
          <label for="login-username">Потребителско име</label>
        </div>

        <div class="input-field col s6">
           <i class="material-icons prefix">lock</i>
           <input id="login-password" type="password" class="validate" name="login-password" minlength="6" maxlength="20" required>
           <label for="login-password">Парола</label>
           <?php echo $errorLogin; ?>
        </div>

         <div class="center-align">
         <button id ="login-btn"class="btn waves-effect waves-light" type="submit" name="login-btn">Влез
           <i class="material-icons right">send</i>
         </button>
       </div>

    </form>
  </div>
