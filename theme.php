<?php
require_once "./Repository/themeRepository.php";
session_start();

// Fixed: Check if user is logged in and get their themes
// if(empty($_SESSION['id'])){
//     header("location:login.php");
//     exit();
// }
$userid=$_SESSION['id'];
$themeRepo = new ThemeRepository();
$themes = $themeRepo->findAll($userid);
if(isset($_POST["submiting"])){
      header("location: theme.php");
}

?>
<html>

<link rel="stylesheet" href="public/public/style/theme.css">
<link rel="stylesheet" href="public/public/style/style.css">
<div class="create-btncontainer">
    <button class="create-theme-btn" id="createTheme">Create New Theme</button>
</div>

<div class="modal-overlay" id="themeModal">
    <div class="modal-box">
        <h2 class="modal-title">Theme Settings</h2>

        <form action="servicetheme.php" method="POST" id="themeForm">

    <div class="modal-input-group">
        <label>Theme Name</label>
        <input type="text" placeholder="Enter theme name"
               name="themeName" class="modal-input" id="themename">
    </div>

            <div class="input-group">
                <label for="maxNotes">Max Notes</label>
                <input type="number" id="maxNotes" name="maxNotes" min="1"
                       placeholder="Enter max number of notes">
            </div>

            <span>Background Color :</span>
            <input type="color" value="#09ff00" name="backgroundColor" id="bgColor">

            <input type="hidden" name="formType" value="newtheme">

            <div class="modal-actions">
                <input type="submit" class="create-btn"
                        name="submiting" value="Create">
                </input>

                <input type="submit" class="modify-btn"
                        id="modifyTheme" name="submiting"
                        value="modify" style="display:none;">
                </input>
            </div>

            <div id="thememodalerror"
                 style="color:red;text-align:center;margin-top:5px;"></div>
        </form>

        <span class="close-modal" id="closeModal">✕</span>
    </div>
</div>

<section class="themes-section" id="themesContainer">
    <?php if(empty($themes)): ?>
        <p style="color : green; text-align: center;">No themes found. Create your first theme!</p>
    <?php else: ?>
        <div class="themes-grid">
            <?php foreach ($themes as $theme): ?>
                <div class="theme-card" style="background: <?= $theme['bColor'] ?>;">
                    <h2 class="themetitless">
                        <span>Title </span> : <?= $theme['themeName'] ?>
                    </h2>
                    <p class="theme-color">
                        Theme Color: <?= $theme['bColor'] ?>
                    </p>
                    <p class="theme-notes">
                        Max Notes: <?= $theme['notesNumber'] ?>
                    </p>

                    <div class="theme-actions" style="display: flex; gap:20px;">
                        <form action="config/database.php" method="POST">
                            <input type="hidden" name="theme_id" value="<?= $theme->id ?>">
                            <button class="view-btn" type="submit" name="viewnote">View Notes</button>
                        </form>
                        
                        <form action="config/database.php" method="POST">
                            <input class="modify-btn" type="submit" name="action" value="modify">
                            <input type="hidden" name="theMeID" value="<?= $theme->id ?>">
                        </form>
                        
                            <button class="delete-btn" name="deletetheme" value="<?= $theme['id'] ?>">Delete</button>
                           <? if(isset($_POST["deletetheme"])){
                            $themeRepo->delete($theme['id']);
                             header("location: theme.php");
                             }
                             ?>

                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
<!-- 
 if(isset($_POST["deletetheme"])){
                            $themeRepo->delete($theme['id']);
                             header("location: theme.php");
                             } -->
                      
<script src="public/public/js/theme.js"></script>
</body>
</html>