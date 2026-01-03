<?php
include_once "./database/user.php";
include_once "./database/dataconection.php";
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
      $user->userName,
      $user->password,
      $user->createdDate,
      $user->role,
      $user->status
    ]);
  }
  public function login(User $user): bool
  {

    $sql = "SELECT * FROM users WHERE  userName  = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$user->userName]);


    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    if (!$row) {
      header("Location : ../login.php");
      exit;
    }

    if ($user->password == $row['passsword']) {
      $user->setID($row["id"]);
      $user->setName($row['name']);
      $user->setUserName($row['userName']);
      $user->setCreatedDate($row['createdDate']);
      $user->setRoleID($row['role_ID']);
      $user->setStatus($row['status']);

      if ($user->status == "Pending") {
        header("Location: pendingpage.php");
      } else {
          header("Location: dashboard.php");
      
      }
    }
    return true;
  }



  public function findAll()
  {
    $UsersObj = [];
    $sql = "select * from users where 1 = 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $Users = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($Users as $user) {
      $userobj = new user($user->name, $user->userName, $user->passsword, $user->createdDate, $user->role_ID, $user->status);
      $userobj->setID($user->id);
      $UsersObj[] = $userobj;
    }

    return $UsersObj;
  }




  public function findById($id)
  {

    $query = "select * from users where id = :id";


    $stmt = $this->pdo->prepare($query);
    $stmt->execute([
      ":id" => $id
    ]);

    $user = $stmt->fetch(PDO::FETCH_OBJ);


    $userobj = new user($user->name, $user->userName, $user->passsword, $user->createdDate, $user->role_ID, $user->status);

    $userobj->setID($id);

    return $userobj;
  }

  public function updateStatus($id, $statuuus) {
   $query = 
   "UPDATE users 
   SET status = '$statuuus'
   where id = $id;";
   $stmt = $this->pdo->prepare($query);
   $stmt->execute();
   header("Location: adminpage.php");
  }
}
