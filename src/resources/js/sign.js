//toggle Register and Signup Form
document.addEventListener("DOMContentLoaded", function() {
    let signupForm = document.querySelector("#signupForm");
    let registerForm = document.querySelector("#registerForm");
    let checkBoxSign = document.querySelector("#checkBoxSign");
   

    let labelSignup = document.querySelector("#label-signup");
    let labelRegister = document.querySelector("#label-register");

    // Inicializa signupForm como visible y registerForm como oculto
    signupForm.style.display = "flex";
    registerForm.style.display = "none";
  
    checkBoxSign.addEventListener("change", function(){
        if(this.checked){
            signupForm.style.display = "none";
            registerForm.style.display = "flex";
            labelSignup.style.color = "var(--gray)";
            labelRegister.style.color = "var(--blue)";
        }else{
            signupForm.style.display = "flex";
            registerForm.style.display = "none";
            labelSignup.style.color = "var(--blue)";
            labelRegister.style.color = "var(--gray)";
        }
    });
  });

