<?php

class Theme{
    private $id;
    private $themename;
    private $color;
    private $notesnumber;
    private $userId;
    private $statu;
    
    public function __construct($name, $color, $notesNumber, $userid,$statu){
        $this->themename = $name;
        $this->color = $color;
        $this->notesnumber = $notesNumber;
        $this->userId = $userid;
        $this->statu=$statu;
    }

    public function setid($id){
        if(!is_numeric($id) || $id <= 0){
            exit();
        }
        $this->id = $id;
    }

    public function __get($property) {
            return $this->$property;
       
    }
}
?>