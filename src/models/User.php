<?php

namespace Andres\MyNotes\models;
use Andres\MyNotes\models\Dbh;
use PDO;
use PDOException;

class User extends Dbh{

    private $uuid;
    private $username;
    private $password;
    private $email;
    private $hash_password;

    public function __construct($username, $email, $password ){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->uuid = uniqid();
    }

    public function getUuid(){
        return $this->uuid;
    }
    public function setUuid( $uuid ){
        $this->uuid = $uuid;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setHashPassword($hash_password){
        $this->hash_password = $hash_password;
     }
    public function save(){
        try {
        $dbh = new Dbh();
        $pdo = $dbh->connect();   
        $sql = "INSERT INTO users (uuid, username, email, hash_password) VALUES (:uuid, :username, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":uuid", $this->uuid);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $hash_password = password_hash($this->password, PASSWORD_BCRYPT);
        $this->password = $hash_password;
        $stmt->bindParam(":password", $this->password);
        $stmt->execute();
        } catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    public static function getAll(){
        $dbh = new Dbh();
        $pdo = $dbh->connect();
        $users = [];

    }
   public static function newUserFromArray($array){
   $password = isset($array['password']) ? $array['password'] : null;
   $hash_password = isset($array['hash_password']) ? $array['hash_password'] : null;
   $user = new User($array['username'], $array['email'], $password);
   $user->setUuid($array['uuid']);
   $user->setHashPassword($hash_password); 
   return $user;
}
public static function getUser($uuid){
    $dbh = new Dbh();
    $pdo = $dbh->connect();
    $sql = "SELECT * FROM users WHERE uuid = :uuid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":uuid", $uuid);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ? User::newUserFromArray($user) : null;
  }
    public function update(){

    }
    public function delete(){}
    
    public static function checkCredentials($username, $password) {
        try {
            $dbh = new Dbh();
            $pdo = $dbh->connect();
            
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
           
            if ($user !== false && password_verify($password, $user['hash_password'])) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
      }
}