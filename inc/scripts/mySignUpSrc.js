window.onload = function (){

  //Remove error spans
        var userNameInput =  document.getElementById("username");
        var userNameErr = document.getElementById("errorUsername");

        var emailInput =  document.getElementById("email");
        var emailErr = document.getElementById("errorEmail");

        var passwordInput =  document.getElementById("password");
        var passwordErr = document.getElementById("errorPassword");

        function removeUserNameError(){
          if(userNameErr !== null){
            userNameErr.parentNode.removeChild(userNameErr);
          }
        }

        function removeEmailError(){
          if(emailErr !== null){
            emailErr.parentNode.removeChild(emailErr);
          }
        }

        function removePasswordError(){
          if(passwordErr !== null){
            passwordErr.parentNode.removeChild(passwordErr);
          }
        }

        userNameInput.addEventListener("focus", removeUserNameError);
        emailInput.addEventListener("focus",removeEmailError);
        passwordInput.addEventListener("focus",removePasswordError);

    }
