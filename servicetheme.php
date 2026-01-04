<?php
// Start session FIRST before any includes
session_start();

require_once "./Repository/themeRepository.php";
require_once "./database/theme.php";

class serviceTheme{
    private $themeRepository;

    public function __construct(){
        $this->themeRepository = new ThemeRepository();
    }
    
    public function createTheme(){
        
        if(isset($_POST["formType"])){
            
            
            if(empty($_POST["themeName"]) || empty($_POST["maxNotes"]) || empty($_POST["backgroundColor"])){
                die("Error: All fields are required");
            }
            
            
            // if(empty($_SESSION['id'])){
            //     die("Error: User not logged in");
            // }
            
            try {
                $themename = trim($_POST["themeName"]);
                $noteNumbers = intval($_POST["maxNotes"]);
                $color = $_POST["backgroundColor"];
                $userID = $_SESSION['id'];
                
                
                $thm = new Theme($themename, $color, $noteNumbers, $userID);
                
                $result = $this->themeRepository->create($thm);
                
                if($result){
                    header("Location: theme.php");
                    exit();
                } else {
                    die("Error: Failed to create theme");
                }
                
            } catch(Exception $e){
                die("Error: " . $e->getMessage());
            }
        } else {
            header("Location: theme.php");
            exit();
        }
    }
    
    public function deleteTheme(){
        if(isset($_POST["deletetheme"])){
            try {
                $themeId = $_POST["theme_id"];
                $this->themeRepository->delete($themeId);
                header("Location: theme.php");
                exit();
            } catch(Exception $e){
                die("Error deleting theme: " . $e->getMessage());
            }
        }
    }
}

$obj = new serviceTheme();


if(isset($_POST["deletetheme"])){
    $obj->deleteTheme();
} else {
    $obj->createTheme();
}
?>