<?php
require __DIR__ . '/../../vendor/autoload.php';
use Andres\MyNotes\Models\User;


if (session_status() == PHP_SESSION_NONE) {
    session_start();
   }

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signup-form"]) ){
    $username = $_POST["username"];
    $password = $_POST["password"];

  $user = User::checkCredentials($username, $password);

  if($user){
    $_SESSION["username"] = $user['username'];
       $_SESSION["uuid"] = $user['uuid'];
 header("Location: ../../?view=home");
  } else {
    $_SESSION["errorMsg"] = "Credentials failed, please try to SignIn again";
    ob_end_clean();
    header("Location: ../../?view=sign");
  }
}