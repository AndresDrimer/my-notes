<?php
require __DIR__ . '/../../vendor/autoload.php';
use Andres\MyNotes\Models\Note;

if (count($_POST) > 0) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $uuid = $_POST['uuid'];

    $note = Note::getNote($uuid);
    $note->setTitle($title);
    $note->setContent($content);

    $note->update();
    header("Location: ../../index.php");

} else if( isset($_GET["uuid"]) ){
    $uuid = $_GET["uuid"];
    $note = Note::getNote($uuid);
    return $note;
} else{
    header("Location: ./index.php");
}