<?php
require_once "/../database/dataconection.php";

class ThemeRepository {
    private $pdo;
    
    public function __construct(){
        $this->pdo = new dataconnect();
    }
    
    public function create($theme){
        $sql = 'INSERT INTO themes (themeName, bColor, notesNumber, userId) 
                VALUES(:themename, :color, :notesnumber, :userId)';
        
        $connection = $this->pdo->connection();
        $stmt = $connection->prepare($sql);
        
        $stmt->bindParam(":themename", $theme->themename);
        $stmt->bindParam(":color", $theme->color);
        $stmt->bindParam(":notesnumber", $theme->notesnumber);
        $stmt->bindParam(":userId", $theme->userId);
        
        $stmt->execute();
        return $theme;
    }
}
?>