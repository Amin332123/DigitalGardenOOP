<?php
include_once "../database/dataconection.php";
class ThemeRepository{
    private $id;
    private $pdo;
    public function creat($theme){
        $sql='INSERT INTO Themes VALUES(:themename,:color,:notenumber)';
        $stmt=new dataconnect()->$this->pdo->prepare($sql);
        
        
    }
}