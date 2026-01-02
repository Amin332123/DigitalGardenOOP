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

    <!-- REQUIRED FIX -->
    <!-- <input type="hidden" name="themeId" id="themeId" value="?>"> -->

    <!-- KEPT EXACTLY AS YOU NEED -->
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
   
        <div class="themes-grid">
            <div class="theme-card" style="background: ;">
                <h2 class="themetitless"><span>Title </span> : <div class="themetitle" style="display: inline;"></div></h2>
                <p class="theme-color" style="display: inline;">Theme Color : <div class="colortheme" style="display: inline;"></div></p>
                <p class="theme-notes">Max Notes: <div class="maxnotConatiner"></div></p>

                <div class="theme-actions"  style="display: flex; gap:20px;">
                    <form action="config/database.php" method="POST">
                     <input type="hidden" name="theme_id" value="">
                        <button class="view-btn" type="submit" name="viewnote">View Notes</button>
                    </form>
                   <form action="config/database.php" method="POST">
                    <input class="modify-btn" type="submit" name="action"  value="modify"></input>
                    <input type="hidden" name="theMeID" value="">
                   </form>
                    <a href="./config/database.php?delete="><button class="delete-btn">Delete</button></a>
                </div>
            </div>
        </div> <?php

            
                ?>
</section>
<script src="public/public/js/theme.js">
</script>
</body>

</html>