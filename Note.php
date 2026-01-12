<?php
include_once "./Repository/noteRepository.php";
include_once "./Repository/themeRepository.php";
include_once "./servicenote.php";
$noterepo=new Noterepository();
$notes=$noterepo->findAll($_SESSION["themeid"]);



// include("includes/headerregistred.php");
// include("config/database.php");


// if (!isset($_SESSION['id'])) {
//     header("Location: login.php");
//     exit;
// }
// //  displayNotes($conn);
// $sqlNote = "select themeName , Notes.id , title, importance, Notes.createdDate , content from Notes , Themes where associatedThemeId = '{$_SESSION['AssociatedThemeId']}' and Themes.id = '{$_SESSION['AssociatedThemeId']}' ";
// $result = $conn->query($sqlNote);
// $Notes = [];
// while ($row = $result->fetch_assoc()) {
//   $Notes[] = $row;
// }





?>
<link rel="stylesheet" href="public/public/style/note.css">

<link rel="stylesheet" href="public/public/style/style.css">



<div class="note-modal" id="notemodal">
  <div class="note-modal-content">
    <span class="close-modal" id="closeNoteModal">✕</span>
    <h2 id="notemodaltitle"> Note</h2>

    <form action="./servicenote.php" id="NoteForm" method="POST">
      <label>Title</label>
      <input type="text" placeholder="Enter note title" id="noteTitle" name="noteTitle">

      <label>Importance (Stars)</label>
      <input type="number" min="0" max="5" placeholder="0 - 5" id="improtance" name="noteImportance">

      <label>Content</label>
      <textarea class="note-textarea" maxlength="600" placeholder="Max 100 words" id="content" name="noteContent"></textarea>
      <small class="word-counter">0 / 100 words</small>
      <input type="hidden" name="notetype" value="createnote">
      <!-- <input type="hidden" name="theme_id" value=""> --> 

      <div class="btns">
        <!-- <button class="modify-btn">Modify</button> -->
        <button type="submit" name="createNote" class="create-btn">Create</button>
      </div>
    </form>
    <div id="errorNoteContainer"></div>

  </div>
</div>



<div class="create-btncontainer">


  <button class="create-theme-btn" id="createNote">Create New Note</button>

</div>



<section class="notes-section">



 <?php if(empty($notes)): ?>
        <p style="color: green; text-align: center; font-size: 18px; margin-top: 50px;">
            No notes found. Create your first theme!
        </p>
         <?php else: ?>
 

    <div class="notes-grid">
      <?php foreach ($notes as $note): ?> 
      <div class="note-card">
       
      
     <h3 class="note-title">Title : <?=$note->title?></h3>

        <div class="notecontent">
          <h4 style="visibility: hidden;">Content : <?=$note->descreption?> </h4>
          <div class="noteconnteent">
           
          </div>
        </div>

        <p class="note-stars">importance : <?= $note->importance ?></p>
        <p class="note-date">Created Date : <?=$note->createdDate?></p>

<?php
        $themeRepo=new ThemeRepository();
        $themeid=$note->id;
        $themeName=$themeRepo->findName($themeid);
?>


        <p class="note-theme">Assosiated Theme : <?=$themeName?></p>
        <div class="note-actions">
          <button class="view-btn">View Content</button>
          <form action="servicenote.php" method="POST" style="background-color: #0b84e8; border-radius: 10px;">
           <input type="hidden" name="noteidmodify" value="<?=$note->id?>">
          <button type="sumbit" name="ModifyNote" style="background-color: #0b84e8; color: white;">Modify</button>
            
          </form>
          <form action="servicenote.php" method="POST">
             <input type="hidden" name="noteid" value="<?=$note->id?>">
            <button type="submit" class="delete-btn" name="deleteNote">Delete</button>
           
          </form>
          
        </div>
        
      </div>
  
    </div> 
    
    <div id="modalOverlay" class="overlay">
  <div class="modal">
    <p class="contentContainer"><?=$note->description?></p>
    <button class="closeNoteContentBtn">Close</button>
  </div>
</div>
<?php endforeach;?>
      <?php endif; ?>


</section>


<script src="public/public/js/note.js" defer>

</script>


</body>

</html>