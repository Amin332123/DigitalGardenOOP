<?php
include_once "../database/dataconection.php";
class ThemeRepository{
    private $id;
    private $pdo;
    public function __construct(){
        $this->pdo=new dataconnect()->connection();
    }
    public function creat($theme){
        $sql='INSERT INTO Themes VALUES(:themename,:color,:notenumber,:userId)';
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindParam(":themename",$theme->themename);
        $stmt->bindParam(":color",$theme->color);
        $stmt->bindParam(":notenumber",$theme->Notenumber);
        $stmt->bindParam(":userId",$theme->userID);
        $stmt->execute();


        
        
    }
}