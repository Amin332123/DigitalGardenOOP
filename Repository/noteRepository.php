<?php
require_once "./database/dataconection.php";
require_once "./database/note.php";
class Noterepository{
    private $id;
    private $pdo;
    public function __construct(){
        $conn =new dataconnect();
        $this->pdo = $conn->connection();
    }
     
   
    
      public function create($note){
        try {
     
        $sql='INSERT INTO notes(title,importance,createdDate,associatedThemeId,description)VALUES(:title,:importance,:creatDate,:associatedThemeId,:description)';
            
            $stmt= $this->pdo->prepare($sql);            
             $noteTitle = $note->title;
             $importance = $note->importance;
             $createDate = $note->createdDate;
             $themeId = $note->associatedthemeID;
             $description = $note->descreption;
           
            
        $stmt->bindParam(":title",$noteTitle);
        $stmt->bindParam(":importance",$importance);
        $stmt->bindParam(":creatDate",$createDate);
        $stmt->bindParam(":associatedThemeId", $themeId);
        $stmt->bindParam(":description",$description);

        $stmt->execute();
                        
        } catch(PDOException $e) {
            echo "Theme creation error: " . $e->getMessage();
          
        }
    }

        public function findAll($themeId)
    {
        try {
            $query = "SELECT * FROM Notes WHERE associatedThemeId = :ThemeId ORDER BY id DESC";
     
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":ThemeId", $themeId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            $Notes = [];
            foreach ($result as $obj) {
                $nt = new Note($obj->title,$obj->createdDate,$obj->importance,$obj->associatedThemeId,$obj->description);
                $nt->setId($obj->id);
                array_push($Notes, $nt);
            }

            return $Notes;

        } catch(PDOException $e) {
            echo "Theme fetch error: " . $e->getMessage();
            return [];
        }
    }
    public function delete($id){
        try {
            $query = "DELETE FROM notes WHERE id = :id";
        
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        } catch(PDOException $e) {
            echo "Theme deletion error: " . $e->getMessage();
            return false;
        }
    }

       public function findById($id){
        try {
            $query = "SELECT * FROM Notes WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $obj = $stmt->fetch(PDO::FETCH_OBJ);
            
            if($obj){
                $th = new Note($obj->title,  $obj->creatDate, $obj->importance,$obj->themeID,$obj->descreption);
                $th->setId($obj->id);
                return $th;
            }
            
            return null;
        } catch(PDOException $e) {
            echo "Theme findById error: " . $e->getMessage();
            return null;
        }
    }
     public function update($Note){
        try {
            $query = "UPDATE Notes SET title = :title, importance = :importance WHERE id = :id";
            $stmt = $this->pdo->prepare($query);            
            
            $title = $Note->title;
            $importance = $Note->importance;
            $id = $Note->id;
            
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":importance", $importance);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Theme update error: " . $e->getMessage();
            return false;
        }
    }
}

