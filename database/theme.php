<?php

class Theme{
    private $id;
    private $themename;
    private $color;
    private $notesnumber;
    private $userId;
    
    public function __construct($name, $color, $notesNumber, $userid){
        $this->themename = $name;
        $this->color = $color;
        $this->notesnumber = $notesNumber;
        $this->userId = $userid;
    }

    public function setid($id){
        if(!is_numeric($id) || $id <= 0){
            echo "This id: " . $id . " does not exist";
            exit();
        }
        $this->id = $id;
    }

    public function __get($property) {
            return $this->$property;
       
    }
}
?>