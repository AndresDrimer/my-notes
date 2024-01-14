<?php 

use Andres\MyNotes\Models\Dbh;
use Andres\MyNotes\Models\Note;
ob_start();
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
if( $_SESSION["username"]){
if( isset($_GET["view"]) ){
   $view = $_GET["view"];
   require "./src/views/" . $view .".php";
} else {
   require "./src/views/home.php";
}
} else {
   require"./src/views/sign.php";
}

