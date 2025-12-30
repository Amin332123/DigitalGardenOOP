<?php
class ThemeRepository{
    private $id;
    private $pdo;
    public function creat($theme){
        $sql='INSERT INTO Themes VALUES(:themename,:color,:notenumber)';
        
    }
}