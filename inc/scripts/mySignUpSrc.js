window.onload = function (){

  //Remove error spans
        const userNameInput =  document.getElementById("username");
        const userNameErr = document.getElementById("errorUsername");

        const emailInput =  document.getElementById("email");
        const emailErr = document.getElementById("errorEmail");

        const passwordInput =  document.getElementById("password");
        const passwordErr = document.getElementById("errorPassword");

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
