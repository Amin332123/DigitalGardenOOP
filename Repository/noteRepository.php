<?php
include_once "../database/dataconection.php";
class Noterepository{
    private $id;
    private $pdo;
    public function __construct(){
        $this->pdo=new dataconnect()->connection();
    }
     
    public function creat($note){
        $sql='INSERT INTO Notes(title,importance,createdDate)VALUES(:title,:importance,:creatdate,:themeid)';
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindParam(":title",$note->title);
        $stmt->bindParam(":importance",$note->importance);
        $stmt->bindParam(":title",$note->creatdate);
        $stmt->bindParam(":theme",$themeid);
        $stmt->execute();
    }
    
      public function create($note){
        try {
     
     $sql='INSERT INTO Notes(title,importance,createdDate)VALUES(:title,:importance,:creatdate,:themeid)';
;
            
            $connection = $this->pdo->connection();
            
            if(!$connection){
             echo "Database connection failed";
            }
            
            $stmt=$this->pdo->prepare($sql);            
          
            $themename = $theme->themename;
            $color = $theme->color;
            $notesnumber = $theme->notesnumber;
            $userId = $theme->userId;
            
            $stmt->bindParam(":themename", $themename, PDO::PARAM_STR);
            $stmt->bindParam(":color", $color, PDO::PARAM_STR);
            $stmt->bindParam(":notesnumber", $notesnumber, PDO::PARAM_INT);
            $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
            
       
            $success = $stmt->execute();
            
            if($success){
                $theme->setId($connection->lastInsertId());
                return $theme;
            }
            
            return false;
            
        } catch(PDOException $e) {
            echo "Theme creation error: " . $e->getMessage();
          
        }
    }
}