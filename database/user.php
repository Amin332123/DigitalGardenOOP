<?php
class User
{
    private $id;
    private $name;
    private $username;
    private $password;
    private $role;
    private $status;
     const BLOCKED='Blocked';
     const ACTIVE='Active';
     const PENDING='Pending';
public function __construct($name,$username,$password,$role,$status=self::PENDING)
    {
        $this->name=$name;
        $this->password=$password;
        $this->username=$username;
        $this->role=$role;
        $this->status=$status;
    }
  public function setid($id){
    if(!is_numeric($id)||$id <=0 ){
        echo"this id :".$id."is not existe";
        exit();
    }
     $this->id = $id;
  }
}