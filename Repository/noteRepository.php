<?php
include_once "../database/dataconection.php";
class Noterepository{
    private $id;
    private $pdo;
    public function __construct(){
        $this->pdo=new dataconnect()->connection();
    }
     
   
    
      public function create($note){
        try {
     
        $sql='INSERT INTO Notes(title,importance,createdDate)VALUES(:title,:importance,:creatdate,:themeid)';
            
            $stmt=$this->pdo->prepare($sql);            
           $noteTitle = $note->title;
            $importance = $note->importance;
            $createDate = $note->creatdate;
            $themeId = $note->themeid;
           
            
        $stmt->bindParam(":title",$noteTitle);
        $stmt->bindParam(":importance",$importance);
        $stmt->bindParam(":title",$createDate);
        $stmt->bindParam(":theme",$ $themeId);
        $stmt->execute();
                        
        } catch(PDOException $e) {
            echo "Theme creation error: " . $e->getMessage();
          
        }
    }

        public function findAll($themeId)
    {
        try {
            $query = "SELECT * FROM themes WHERE associatedThemeId = :ThemeId ORDER BY id DESC";
     
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":ThemeId", $themeId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            $Notes = [];
            foreach ($result as $obj) {
                $nt = new Note($obj->title, $obj->description, $obj->creatdate, $obj->themeId);
                $nt->setId($obj->id);
                array_push($Notes, $nt);
            }

            return $Notes;

        } catch(PDOException $e) {
            echo "Theme fetch error: " . $e->getMessage();
            return [];
        }
    }
}