<?php
// include_once "./theme.php";
// include_once "./user.php";
 class favorite{
    
       private $themeID;
       private  $userID;
       public function __construct($themeID,$userID){
      
       $this->themeID=$themeID;
       $this->userID=$userID;
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