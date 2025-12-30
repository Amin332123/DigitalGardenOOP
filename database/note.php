<?php 
class Note {
        private $id;
        private $title;
        private $descreption;
        private $createdDate;
        private $associatedthemeID;

    public function __construct($title, $descreption, $createdDate, $themeID){
        $this->title  = $title;
        $this->descreption = $descreption;
        $this->createdDate = $createdDate;
        $this->associatedthemeID = $themeID;
    }

    public function __setid($id){
        if(!is_numeric($id)||$id <=0 ){
            echo"this id :".$id."is not existe";
            exit();
        }
        $this->id = $id;
    }

    public function __get($property) {
        return $this->$property;
    }
    
    }