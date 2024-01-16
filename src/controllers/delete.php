<?php
require __DIR__ . '/../../vendor/autoload.php';
use Andres\MyNotes\models\Note;

if(isset($_POST["uuid"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    $uuid = $_POST["uuid"];

    $note = Note::getNote($uuid);
    if ($note !== null) {
        $note->delete();
        header("Location: ../../index.php");
    } else {
        echo "No note found with the given UUID.";
    }
  }
