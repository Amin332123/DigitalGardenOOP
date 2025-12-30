<?php 
include_once "../database/User.php";
include_once "../database/dataconection.php";
class UserRepository{
    private $id;
    private $pdo;
    public function __construct(){

    }
     public function register($user){
        $sql='INSERT TABLE Users(name,userName,password,createdDate) VALUES(:name,:username,:password,NOW())';
        $connet=new dataconnect();
       $stmt= $connet->$this->pdo->prepare($sql);
       $stmt->execute();
       $result=$stmt->fetch(PDO::FETCH_OBJ);
       $user=[];
       foreach($result as $res){
        $use=new User($res->name,$res->username,$res->password,$res->role,$res->status);
        $use->setid($res->id);
        array_push($user,$use);
       }
       return $user;
     }
}