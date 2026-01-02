<?php
include_once "./Repository/themeRepository.php";
include_once "./database/theme.php";
session_start();

class serviceTheme{
    private $themeRepository;

    public function __construct(){
        $this->themeRepository = new ThemeRepository();
    }
    
    public function createTheme(){
        if(isset($_POST["formType"])){
            $themename = $_POST["themeName"];
            $noteNumbers = $_POST["maxNotes"];
            $color = $_POST["backgroundColor"];
            $userID = $_SESSION['id'] ?? null;
            
            // Check if user is logged in
            if(!$userID){
                echo "Error: User not logged in!";
                return;
            }
            
            $thm = new Theme($themename, $color, $noteNumbers, $userID);
            
            
            $result = $this->themeRepository->create($thm);
            
            if($result){
                echo "Theme created successfully!";
                
            }
        }
    }
}

$obj = new serviceTheme();
$obj->createTheme();
?>