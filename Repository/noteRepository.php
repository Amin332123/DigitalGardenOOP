<?php
class Noterepository{
    private $id;
    private $pdo;
     
    public function creat($note){
        $sql='INSERT INTO Notes(title,importance,createdDate)VALUES(:title,)'
    }
}