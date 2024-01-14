//toggle Register and Signup Form
document.addEventListener("DOMContentLoaded", function() {
    let signupForm = document.querySelector("#signupForm");
    let registerForm = document.querySelector("#registerForm");
    let checkBoxSign = document.querySelector("#checkBoxSign");
   
    // Inicializa signupForm como visible y registerForm como oculto
    signupForm.style.display = "flex";
    registerForm.style.display = "none";
  
    checkBoxSign.addEventListener("change", function(){
        if(this.checked){
            signupForm.style.display = "none";
            registerForm.style.display = "flex";
        }else{
            signupForm.style.display = "flex";
            registerForm.style.display = "none";
        }
    });
  });