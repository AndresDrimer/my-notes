<?php
require __DIR__ . '/../../vendor/autoload.php';
use Andres\MyNotes\Models\Note;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
   }

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = $_POST["title"];
    $content = $_POST["content"];

    if (empty($title) || empty($content)) {
        $_SESSION["errorMsg"] = "Please complete both TITLE and CONTENT.";
        ob_end_clean();
        header("Location: ../../?view=create");
    } else {
        $note = new Note($title, $content);
        $note->save();
        ob_end_clean();
        header("Location: ../../index.php");
    }
}