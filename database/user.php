<?php
class User
{
    private $id;
    private $name;
    private $userName;
    private $password;
    private $role;
    private $createdDate;
    private $status;
    const BLOCKED = 'Blocked';
    const ACTIVE = 'Active';
    const PENDING = 'Pending';
    public function __construct($name, $userName, $password, $createdDate , $role = 1, $status = self::PENDING)
    {
        $this->name = $name;
        $this->password = $password;
        $this->userName = $userName;
        $this->createdDate = $createdDate;
        $this->role = $role;
        $this->status = $status;
    }
    public function __setid($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            
            return;
        }
        return $this->id;
    }
    public function __get($property)
    {
        return $this->$property ;
    }
    public function setID($id) {
        $this->id = $id;

    }

    public function setName($name) {
        $this->name = $name ;
    }
    public function setUserName($name) {
        $this->userName = $name ;
    }

    public function setPassword($name) {
        $this->password = $name ;
    }

    public function setRoleID($name) {
        $this->role = $name ;
    }

    public function setCreatedDate($name) {
        $this->createdDate = $name ;
    }

    public function setStatus($name) {
        $this->status = $name ;
    }
}
// SQL :  vue materialisé ; 
