<?php include("includes/headerregistred.php");
session_start();

// if (empty($_SESSION['id'])) {
//     header("Location: http://digitalgarden.test/login.php");
// }
// session_start();
// if (!isset($_SESSION['id'])) {
//     header("Location: login.php");
//     exit;
// }
// 
?>
<link rel="stylesheet" href="public/public/style/dashboard.css">
<link rel="stylesheet" href="public/public/style/style.css">
<section class="user-dashboard">
  <h1 class="user-name" id="userRegisteredName">Welcome,
    <?=

    $_SESSION["userName"]


    ?>
    👋</h1>

  <p class="user-info">
    Account Created: <span id="createdDate">
      <?=

      $_SESSION["createdDate"]

      // if ($_SESSION['checker'] == false) {
      //     echo " " . $_SESSION['createDate'];
      // } else {
      //     echo " " . $_SESSION['createddDate'];
      // }  



      ?>



    </span>
  </p>

  <p class="user-info">
    Session Login Time: <span> <?php echo " " . date("H:i a") ?></span>
  </p>

  <form action="./Repository/themeRepository.php" method="POST">
    <button class="view-themes-btn" id="themebtn" type="submit" name="viewtheme">View Themes</button>

      
  </form>

</section>
<script src="public/public/js/theme.js"></script>
<?php include("includes/footer.php") ?>