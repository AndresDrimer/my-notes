<?php
require "src/includes/header.inc.php";

if(isset($_SESSION["errorMsg"])){
    echo "<div class='back-overlay'></div><div class='alert alert-danger'><div class='close'>✖</div>" . $_SESSION["errorMsg"] . "</div>";
    
    unset($_SESSION["errorMsg"]); 
  }
?>

<div class="sign-container">
<div>
<img src="public/logo.png" id="sign-image-hero">
</div>
<div>

<label class="switch">


  <input type="checkbox" id="checkBoxSign">
  <span class="slider round">
  <span class="label" id="label-signup">Signup</span>
  <span class="label" id="label-register">Register</span>
</label>    


    <form method="post" action="src/controllers/register_control.php" id="registerForm">
        <input type="hidden" name="register-form">
    <input type="text" name="username" placeholder="Username...">
    <input type="email" name="email" placeholder="Email...">
    <input type="password" name="password" placeholder="Password...">
    <input type="submit" value="Register New User">
    </form>
    
    <form method="post" action="src/controllers/login_control.php" id="signupForm">
    <input type="hidden" name="signup-form">
    <input type="text" name="username" placeholder="Username...">
    <input type="password" name="password" placeholder="Password...">
    <input type="submit" value="Sign up">
    </form>
</div>
</div>

<?php
echo "<script src='src/resources/js/sign.js'></script>";
echo "<script src='src/resources/js/create.js'></script>";
?>

<?php
require "src/includes/footer.inc.php";
?>