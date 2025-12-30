<?php
include_once "../database/dataconection.php";
class Noterepository{
    private $id;
    private $pdo;
     
    public function creat($note){
        $sql='INSERT INTO Notes(title,importance,createdDate)VALUES(:title,:importance,:creatdate)';
        $connect=new dataconnect();
        $stmt=$connect->$this->pdo->prepare($sql);
    }
}