<?php
require_once __DIR__ . "/../database/dataconection.php";
require_once __DIR__ . "/../database/theme.php";

class ThemeRepository {
    private $pdo;
    
    public function __construct(){
        $this->pdo = new dataconnect();
    }
   
    public function create($theme){
        try {
            $sql = 'INSERT INTO themes (themeName, bColor, notesNumber, userId) 
                    VALUES(:themename, :color, :notesnumber, :userId)';
            
            $connection = $this->pdo->connection();
            
            if(!$connection){
                echo "Database connection failed";
                return false;
            }
            
            $stmt = $connection->prepare($sql);
            
            $themename = $theme->themename;
            $color = $theme->color;
            $notesnumber = $theme->notesnumber;
            $userId = $theme->userId;
            
            $stmt->bindParam(":themename", $themename);
            $stmt->bindParam(":color", $color);
            $stmt->bindParam(":notesnumber", $notesnumber);
            $stmt->bindParam(":userId", $userId);
            
            
            $stmt->execute();
            
          
          
            
            return $theme;
            
        } catch(PDOException $e) {
            echo "Theme creation error: " . $e->getMessage();
            return false;
        }
    }
    
    public function findAll($userId)
    {
        try {
            $query = "SELECT * FROM themes WHERE userId = :userId ORDER BY id DESC";
            $connection = $this->pdo->connection();
            $stmt = $connection->prepare($query);
            $stmt->bindParam(":userId", $userId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            $themes = [];
            foreach ($result as $obj) {
                $th = new Theme($obj->themeName, $obj->bColor, $obj->notesNumber, $obj->userId);
                $th->setId($obj->id);
                array_push($themes, $th);
            }

            return $themes;

        } catch(PDOException $e) {
            echo "Theme fetch error: " . $e->getMessage();
            return [];
        }
    }
    
    public function delete($id){
        try {
            $query = "DELETE FROM themes WHERE id = :id";
            $connection = $this->pdo->connection();
            $stmt = $connection->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch(PDOException $e) {
            echo "Theme deletion error: " . $e->getMessage();
            return false;
        }
    }
    
    public function findById($id){
        try {
            $query = "SELECT * FROM themes WHERE id = :id";
            $connection = $this->pdo->connection();
            $stmt = $connection->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $obj = $stmt->fetch(PDO::FETCH_OBJ);
            
            if($obj){
                $th = new Theme($obj->themeName, $obj->bColor, $obj->notesNumber, $obj->userId);
                $th->setId($obj->id);
                return $th;
            }
            
            return null;
        } catch(PDOException $e) {
            echo "Theme findById error: " . $e->getMessage();
            return null;
        }
    }
    
    public function update($theme){
        try {
            $query = "UPDATE Themes SET themeName = :themename, bColor = :color, 
                      notesNumber = :notesnumber WHERE id = :id";
            $connection = $this->pdo->connection();
            $stmt = $connection->prepare($query);
            
            
            $themename = $theme->themename;
            $color = $theme->color;
            $notesnumber = $theme->notesnumber;
            $id = $theme->id;
            
            $stmt->bindParam(":themename", $themename);
            $stmt->bindParam(":color", $color);
            $stmt->bindParam(":notesnumber", $notesnumber);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Theme update error: " . $e->getMessage();
            return false;
        }
    }
    public function findName($id){
        try{
        $sql="SELECT themeName FROM Themes WHERE id=:id;";
         $connection = $this->pdo->connection();
         $stmt=$connection->prepare($sql);
         $stmt->bindParam(":id",$id);
         return $stmt->execute();
    }
  
    catch(PDOException $e){
         echo"filed to find".$e->getMessage();
         return false;
    }
}
}