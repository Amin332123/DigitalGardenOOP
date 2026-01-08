<?php
include_once "./database/note.php";
include_once "./Repository/noteRepository.php";
session_start();

if (isset($_POST["theme_id"])) {
    $_SESSION["themeid"] = (int) $_POST["theme_id"];
    header("Location: Note.php");
}

class serviceNote
{
    private $NoteRepository;

    public function __construct()
    {
        $this->NoteRepository = new Noterepository();
        
    }
    public function creatNote()
    {


        try {
            $title = $_POST["noteTitle"];
            $content = $_POST["noteContent"];
            $importance = $_POST["noteImportance"];
            $createDate = date("y-m-d");
            $themeID = $_SESSION["themeid"];
            $note = new Note($title, $createDate, $importance, $themeID, $content);
            $this->NoteRepository->create($note);
            header("Location: Note.php");
           
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }


    }


       public function modifyNote()
    {
      
        $newtitle = $_POST["newTitle"];
        $newImportance = $_POST["newImportance"];
        $creatDate=date("y-m-d");
        $newContent = $_POST["newContent"];
        $themeId=$_POST["theme_id"];
        $id=$_POST["noteidmodify"];
        try {
            $Note = new Note(
                
                $newtitle,
                $creatDate,
                $newImportance,
                $themeId,
                $newContent
            );

            $Note->setId($id);

            $this->NoteRepository->update($Note);
        } catch (Exception $e) {
            die("Error Modify theme: " . $e->getMessage());
        }
    }


}
$obj = new serviceNote();

if (isset($_POST["notetype"]) && $_POST["notetype"] == "createnote") {
    
    $obj->creatNote();

}

if(isset($_POST["deleteNote"]) && !empty($_POST["noteid"])){
    $noteRepo = new Noterepository();
    $noteRepo->delete($_POST["noteid"]);
    header("Location: Note.php");
    exit();
}

if(isset($_POST['ModifyNote'])&&!empty($_POST["noteidmodify"])){
   header("Location: modifynoteform.php");
   exit();
}

if(isset($_POST["updateNote"])&&!empty($_POST["noteId"])){
    $obj->modifyNote();
    header("Location: Note.php");
    exit();
}