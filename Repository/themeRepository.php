<?php
require_once __DIR__ . "/../database/dataconection.php";
require_once __DIR__ . "/../database/theme.php";

class ThemeRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new dataconnect();
    }

    public function create($theme)
    {
        $sql = 'INSERT INTO themes (themeName, bColor, notesNumber, userId) 
                VALUES(:themename, :color, :notesnumber, :userId)';

        $connection = $this->pdo->connection();
        $stmt = $connection->prepare($sql);

        // $stmt->bindParam(":themename", $theme->themename);
        // $stmt->bindParam(":color", $theme->color);
        // $stmt->bindParam(":notesnumber", $theme->notesnumber);
        // $stmt->bindParam(":userId", $theme->userId);
        $stmt->execute([
            ":themename" => $theme->themename,
            ":color" => $theme->color,
            ":notesnumber" => $theme->notesnumber,
            ":userId" => $theme->userId
        ]);
        // $stmt->execute();
        return $theme;
    }


    // public function findAll($userId)
    // {
    //     $query = "SELECT * FROM themes WHERE userId = :userId";
    //     $connection = $this->pdo->connection();
    //     $stmt = $connection->prepare($query);
    //     $stmt->bindParam(":userId", $userId);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $result; 
    // }

    public function findAll($userId)
    {
        $query = "SELECT * FROM themes WHERE userId = :userId";
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
    }
    public function delete($id)
    {
        $query = "DELETE from themes where id = :id";
        $connection = $this->pdo->connection();
        $stmt = $connection->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}
