<?php 
include_once "../database/user.php";
class UserRepository{
    private $id;
    private $pdo;
     public function creat($user){
        $sql='INSERT TABLE Users(name,userName,password,createdDate) VALUES(:name,:username,:password,NOW())';
        $stmt=$this->pdo->prepare($sql);
       $result=$stmt->fetch(PDO::FETCH_OBJ);
       $user=[];
       foreach($result as $res){
        $use=new User($res->name,$res->username,$res->password);
        $use->__setid($res->id);
        array_push($user,$use);
       }
       return $user;
     }
}