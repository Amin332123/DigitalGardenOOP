<?php
class User
{
    private $id;
    private $name;
    private $username;
    private $password;
     
public function __construct($name,$username,$password)
    {
        $this->id ;
        $this->name;
        $this->password;
        $this->username;
    }
    public function __setid($id)
    {
        if(!is_numeric($id)|| $id<=0){
            echo"that id :".$this->id."is not existe";
            return;
        }
        return $this->id;
    }
}