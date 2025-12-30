<?php

class Theme {
    private $id;
    private $name;
    private $Color;
    private $noteNumbers;
    private $userID;

  public function __construct($name, $color, $notesNumber, $userid){
    $this->name  = $name;
    $this->Color = $color;
    $this->noteNumbers = $notesNumber;
    $this->userID = $userid;
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
