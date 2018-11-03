
  <!-- Script to prevent reloading the page -->
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
   <script type="text/javascript" src="inc/scripts/mySignUpSrc.js"></script>

   <body>
    <div class="container">
        <form class="col s6" method="post" action="signUp.php">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="username" type="text" class="validate" name="username" minlength="5" maxlength="15" required>
              <label for="username">Потребителско име</label>
              <?php echo $errorUsername; ?>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input id="email" type="email" class="validate" name="email" required>
              <label for="email">Email</label>
              <?php echo $errorEmail; ?>
            </div>

            <div class="input-field col s6">
               <i class="material-icons prefix">lock</i>
               <input id="password" type="password" class="validate" name="password" minlength="6" maxlength="20" required>
               <label for="password">Парола</label>
            </div>

           <div class="input-field col s6">
              <i class="material-icons prefix">lock</i>
              <input id="password2" type="password" class="validate" name="password2" minlength="6" maxlength="20" required>
              <label for="password2">Повтори парола</label>
              <?php echo $errorPassword;?>
           </div>
           <div class="input-field col s6">
               <i class="material-icons prefix">phone</i>
               <input id="phone" type="tel" class="validate" name="phone">
               <label for="phone">Телефон за връзка</label>
           </div>
           <div class="center-align">
             <button class="btn waves-effect waves-light" type="submit" name="register">Регистрирай
               <i class="material-icons right">send</i>
             </button>
          </div>
        </form>
      </div>
   </body>
 </html>