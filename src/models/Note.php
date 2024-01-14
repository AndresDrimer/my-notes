<?php

namespace Andres\MyNotes\Models;
use Andres\MyNotes\Models\Dbh;
use PDO;

class Note extends Dbh{

    private $uuid;
    

    public function __construct( private string $title, private string $content, private string $user_uuid ){
     
        parent::__construct();
        $this->uuid = uniqid();
        $this->user_uuid = $user_uuid;
    }

    public function getUuid(){
        return $this->uuid;
    }
    public function setUuid( $uuid ){
        $this->uuid = $uuid;
    }
    public function getUserUuid(){
        return $this->user_uuid;
    }
    public function setUserUuid( $user_uuid ){
        $this->user_uuid = $user_uuid;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function getContent(){
        return $this->content;
    }
    public function setContent($content){
        $this->content = $content;
    }
    public function save(){
        $dbh = new Dbh();
        $pdo = $dbh->connect();
        
        $sql = "INSERT INTO notes (uuid, title, content, user_uuid) VALUES (:uuid, :title, :content, :user_uuid)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":uuid", $this->uuid);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":user_uuid", $this->user_uuid);
        $stmt->execute();
    }

    public static function getAll($uuid){
        $dbh = new Dbh();
        $pdo = $dbh->connect();
        $notes = [];

        $sql = "SELECT * FROM notes WHERE user_uuid = :uuid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":uuid", $uuid);
        $stmt->execute();
       
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $note = Note::newNoteFromArray($row);
            array_push($notes, $note);
        }
        return $notes;
    }
    public static function newNoteFromArray($array){
        $note = new Note($array['title'], $array['content'], $array["uuid"]);
        $note->setUuid($array['uuid']);
        return $note;
    }
    public static function getNote($uuid){
        $dbh = new Dbh();
        $pdo = $dbh->connect();
        $sql = "SELECT * FROM notes WHERE uuid = :uuid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":uuid", $uuid);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
       
        $note = Note::newNoteFromArray($row);
       
        return $note;      
    }

    public function update(){
        $sql = "UPDATE notes SET title = :title, content = :content WHERE uuid = :uuid";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":uuid", $this->uuid);
        $stmt->execute();
    }
    public function delete(){
        $sql = "DELETE FROM notes WHERE uuid = :uuid";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":uuid", $this->uuid);
        $stmt->execute();
    }
}