<?php
require "src/includes/header.inc.php";

if(isset($_SESSION["errorMsg"])){
    echo "<div class='back-overlay'></div><div class='alert alert-danger'><div class='close'>✖</div>" . $_SESSION["errorMsg"] . "</div>";
    
    unset($_SESSION["errorMsg"]); 
  }
?>


<p class="back-btn"><a href="index.php">< back</a></p>
<h1 id="new-idea-title">New IDEA 💡</h1>
<form action="src/controllers/create_control.php" method="post">
    <input type="text" name="title" placeholder="Title..." autofocus>
    <textarea name="content" placeholder="Content..."></textarea>
    <input type="submit" value="add note">
</form>


<?php
echo "<script src='src/resources/js/create.js'></script>";
?>


<?php
require "src/includes/footer.inc.php";
?>