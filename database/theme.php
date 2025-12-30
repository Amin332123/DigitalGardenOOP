<?php

class themes{
    private $id;
    private $name;
    private $Color;
  public function __construct(){
    $this->id;
    $this->name;
    $this->Color;
  }

  public function __setid($id){
    if(!is_numeric($id)||$id <=0 ){
        echo"this id :".$this->id."is not existe";
        exit();
    }
    return $this->id;
  }
}