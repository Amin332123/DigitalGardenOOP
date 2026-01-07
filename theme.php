<?php
session_start();
require_once "./Repository/themeRepository.php";

if (empty($_SESSION['id'])) {
    header("location:login.php");
    exit();
}


$userid = $_SESSION['id'];

$themeRepo = new ThemeRepository();
$themes = $themeRepo->findAll($userid);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Themes - Digital Garden</title>
    <link rel="stylesheet" href="public/public/style/theme.css">
    <link rel="stylesheet" href="public/public/style/style.css">
</head>

<body>

<!-- style -->
 <style>
        .favorite-checkbox {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 10;
        }

        .favorite-checkbox input[type="checkbox"] {
            display: none;
        }

        .favorite-checkbox label {
            font-size: 28px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            color: rgba(255, 255, 255, 0.4);
        }

        .favorite-checkbox label:hover {
            transform: scale(1.2) rotate(15deg);
        }

        .favorite-checkbox input[type="checkbox"]:checked + label {
            color: #ffd700;
            filter: drop-shadow(0 0 8px rgba(255, 215, 0, 0.6));
        }

        .theme-card {
            position: relative;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .theme-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
    </style>

<!-- end style -->


    <div class="create-btncontainer">
        <button class="create-theme-btn" id="createTheme">Create New Theme</button>
    </div>

    <div class="modal-overlay" id="themeModal">
        <div class="modal-box">
            <h2 class="modal-title">Theme Settings</h2>

            <form action="./servicetheme.php" method="POST" id="themeForm">
                <div class="modal-input-group">
                    <label>Theme Name</label>
                    <input type="text" placeholder="Enter theme name" name="themeName" class="modal-input"
                        id="themename" required>
                </div>

                <div class="input-group">
                    <label for="maxNotes">Max Notes</label>
                    <input type="number" id="maxNotes" name="maxNotes" min="1" placeholder="Enter max number of notes"
                        required>
                </div>

                <div class="input-group">
                    <label>Background Color:</label>
                    <input type="color" value="#09ff00" name="backgroundColor" id="bgColor">
                </div>
                    
                <input type="hidden" name="formType" value="newtheme">

                <div class="modal-actions">
                    <button type="submit" class="create-btn" name="submiting">Create</button>
                    <button type="button" class="modify-btn" id="modifyTheme" style="display:none;">Modify</button>
                </div>

                <div id="thememodalerror" style="color:red;text-align:center;margin-top:5px;"></div>
            </form>

            <span class="close-modal" id="closeModal">✕</span>
        </div>
    </div>

    <section class="themes-section" id="themesContainer">
        <?php if (empty($themes)): ?>
            <p style="color: green; text-align: center; font-size: 18px; margin-top: 50px;">
                No themes found. Create your first theme!
            </p>
        <?php else: ?>
            <div class="themes-grid">
                <?php foreach ($themes as $theme): ?>
                    <div class="theme-card" style="background: <?= $theme->color ?>;">

                    <!-- the star -->
                        <div class="favorite-checkbox">
                            <form action="./servicetheme.php" method="POST">
                            <input type="hidden" name="favoritID" value="<?= $theme->id ?>">
                            <input type="hidden" name="UserId" value="<?= $theme->userId ?>">
                            <input type="checkbox" id="favorite-<?= $theme->id ?>" name="favorite" value="<?= $theme->id ?>">
                            <label for="favorite-<?= $theme->id ?>">★</label>
                            </form>
                        </div>
                        <!-- end star -->
                        <h2 class="themetitless">
                            <span>Title:</span> <?= $theme->themename ?>
                        </h2>
                        <p class="theme-color">
                            Theme Color: <?= $theme->color ?>
                        </p>
                        <p class="theme-notes">
                            Max Notes: <?= $theme->notesnumber ?>
                        </p>

                        <div class="theme-actions" style="display: flex; gap: 20px;">
                            <form action="./servicenote.php" method="POST" style="display:inline;">
                                <input type="hidden" name="theme_id" value="<?= $theme->id ?>">
                                <button class="view-btn" type="submit" name="viewnote">
                                    View Notes

                                </button>
                            </form>

                            <form action="servicetheme.php" method="POST" style="display:inline;">
                                <input type="hidden" name="themeId" value="<?= $theme->id ?>">
                                <button class="modify-btn" type="submit" name="modify" value="modify">Modify</button>
                            </form>

                            <form action="servicetheme.php" method="POST" style="display:inline;">
                                <input type="hidden" name="theme_id" value="<?= $theme->id ?>">
                                <button class="delete-btn" type="submit" name="deletetheme">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <script src="public/public/js/theme.js"></script>
</body>

</html>