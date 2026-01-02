b<?php
  include_once "../database/User.php";
  include_once "../database/dataconection.php";
  class UserRepository
  {
    // private $id;
    private $pdo;
    public function __construct()
    {
      $newcon = new dataconnect();
       $this->pdo = $newcon->connection();
    }
    public function register($user)
    {

      $sql = 'INSERT INTO  Users (name,	userName,	passsword	,createdDate,	role_ID	,status) VALUES(? , ? , ? , ? , ? , ? )';

      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([
        $user->name,
        $user->username,
        $user->password,
        $user->createdDate,
        $user->role,
        $user->status
      ]);
    }
  }

  if (isset($_POST["formType"])) {
    $user = new User($_POST["fullname"], $_POST["username"], $_POST["password"], date("y-m-d"));
    var_dump($user->name);
    $UserRepo = new UserRepository();
    $UserRepo->register($user);
    
  }
