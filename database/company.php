<?php
include_once "./dataconection.php";
class company{
    private $id;
    private $name;
   
    private $teams=[];

    private $empolyes=[];
    public function __construct($id,$name){
        $this->id=$id;
        $this->name=$name;
       
    }
    public function addTeam($team){
    array_push($teams,$team);

   
}
}
class team{
    private $id;
    private $name;
    private $emplyes=[];
    private company $conpany;
     public function __construct($id,$name){
        $this->id=$id;
        $this->name=$name;
       
    }

    
    public function addemploye($emplye){
    array_push($emolyes,$emplye);
    }

}

class emplye{
    private $id;
    private $name;
    private team $team;
    


}