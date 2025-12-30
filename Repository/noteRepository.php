<?php
include_once "../database/dataconection.php";
class Noterepository{
    private $id;
    private $pdo;
    public function __construct(){
        $this->pdo=new dataconnect()->connection();
    }
     
    public function creat($note){
        $sql='INSERT INTO Notes(title,importance,createdDate)VALUES(:title,:importance,:creatdate)';
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindParam(":title",$note->title);
        $stmt->bindParam(":importance",$note->importance);
        $stmt->bindParam(":title",$note->creatdate);
        $stmt->execute();
    }
}