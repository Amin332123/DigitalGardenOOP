<?php

session_start();

require_once "./Repository/themeRepository.php";
require_once "./database/theme.php";
include_once "./database/favoritetheme.php";

class serviceTheme
{
    private $themeRepository;

    public function __construct()
    {
        $this->themeRepository = new ThemeRepository();
    }

    public function createTheme()
    {
        if (isset($_POST["formType"])) {
            if (empty($_POST["themeName"]) || empty($_POST["maxNotes"]) || empty($_POST["backgroundColor"])) {
                die("Error: All fields are required");
            }

            try {
                $themename = $_POST["themeName"];
                $noteNumbers = $_POST["maxNotes"];
                $color = $_POST["backgroundColor"];
                $userID = $_SESSION['id'];
                $statu=$_POST["visibilty"];

                $thm = new Theme($themename, $color, $noteNumbers, $userID,$statu);
                $result = $this->themeRepository->create($thm);

                if ($result) {
                    header("Location: theme.php");
                    exit();
                } else {
                    die("Error: Failed to create theme");
                }
            } catch (Exception $e) {
                die("Error: " . $e->getMessage());
            }
        } else {
            header("Location: theme.php");
            exit();
        }
    }

    public function deleteTheme()
    {
        try {
            $themeId = $_POST["theme_id"];
            $this->themeRepository->delete($themeId);
            header("Location: theme.php");
            exit();
        } catch (Exception $e) {
            die("Error deleting theme: " . $e->getMessage());
        }
    }

    public function modifyTheme()
    {
        $newName = $_POST["newthemeName"];
        $newColor = $_POST["newbackgroundColor"];
        $newNoteNumber = $_POST["newmaxNotes"];
        $newVisibilty=$_POST["newvisibilty"];
        try {
            $theme = new Theme(

                $newName,
                $newColor,
                $newNoteNumber,
                $_SESSION['id'],
                $newVisibilty
            );

            $theme->setId($_POST["themeId"]);

            $this->themeRepository->update($theme);
        } catch (Exception $e) {
            die("Error Modify theme: " . $e->getMessage());
        }
    }

    //  public function changeToArchive(){
       
        
    //     $theme->makeItArchive($id);
    //  }


    public function creatFavorite(){
        $themeID=$_POST["themeid"];
        $userId=$_POST["UserId"];
        try{
            $favo= new favorite($themeID,$userId);
            
             $this->themeRepository->favorite($favo);

        }
        catch(PDOException $e){
        echo "failed to add in favorite".$e->getMessage();
        }

    }
}




$obj = new serviceTheme();

if (isset($_POST["modify"]) && !empty($_POST["themeId"])) {
    $_SESSION['themeID'] = $_POST["themeId"];
    header(header: "Location: modifypage.php");
    exit();
} else if (isset($_POST["modifybtn"])) {
    $obj->modifyTheme();
    header(header: "Location: theme.php");
    exit();
} else if (isset($_POST["deletetheme"]) && !empty($_POST["theme_id"])) {
    $obj->deleteTheme();
   
}
else if(isset($_POST["Archive"])&& !empty($_POST["ArchiveThemeId"])){
     $id=$_POST["ArchiveThemeId"];
     $themeRepo=new ThemeRepository();
      $themeRepo->makeItArchive($id);
      header("Location: theme.php");
     
}

 else if (isset($_POST['themeid'])){
    $obj->creatFavorite();
    header("Location: theme.php");
    }
    else{
        $obj->createTheme();
        header("Location: theme.php");
    }



