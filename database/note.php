<?php 
class Note {
        private $id;
        private $title;
        private $descreption;
        private $createdDate;
        private $associatedthemeID;
        private $importance;

    public function __construct($title,$createdDate,$importance,$themeID,$descreption){
        $this->title  = $title;
        $this->descreption = $descreption;
        $this->createdDate = $createdDate;
        $this->associatedthemeID = $themeID;
        $this->importance = $importance;
    }

    public function setid($id){
        if(!is_numeric($id)||$id <=0 ){
      
            exit();
        }
        $this->id = $id;
    }

    public function __get($property) {
        return $this->$property;
    }
    
    }