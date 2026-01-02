<?php
class User
{
    private $id;
    private $name;
    private $username;
    private $password;
    private $role;
    private $createdDate;
    private $status;
    const BLOCKED = 'Blocked';
    const ACTIVE = 'Active';
    const PENDING = 'Pending';
    public function __construct($name, $username, $password, $createdDate , $role = 1, $status = self::PENDING)
    {
        $this->name = $name;
        $this->password = $password;
        $this->username = $username;
        $this->createdDate = $createdDate;
        $this->role = $role;
        $this->status = $status;
    }
    public function __setid($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            echo "that id :" . $this->id . "is not existe";
            return;
        }
        return $this->id;
    }
    public function __get($property)
    {
        return $this->$property;
    }
}
