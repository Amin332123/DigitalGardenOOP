<?php 
// session_start(); 
// include("includes/header.php");
// require_once "./database/user.php";
// require_once "./Repository/userRepository.php";
// session_start();
// if(isset($_POST["logIn"])){
//     $sql='SELECT name,userName,password FROM Users';
//     $username=$_POST["username"];
//     $name=$_POST["fullname"];
//     $password=$_POST["password"];
    
//     $result=new dataconnect()->pdo->prepare($sql);

//   class logIn{
//     private $userRepository;
//     public function __construct(){
//       $this->userRepository=new UserRepository();
//     }
//         public function creatUser(){
//         $name=$this->$_POST["fullname"];
//        $username = $this->$_POST["username"];
//         $password = $this->$_POST["password"];
        
//         $user  = new User($name,$username, $password);
//         return $this->$user->userRepository->create($user);
    
// }


//   }
// }




?>
<link rel="stylesheet" href="public/public/style/style.css">

<div class="form-container">
    <h2 class="login-title ">Inscription</h2>
    <form action="./Repository/userRepository.php" method="POST" id="signupform">
        <div class="input-group">
            <input type="text" name="fullname" placeholder="Enter your Full Name" id="fullname" class="input-field" required>
        </div>
        <div class="input-group">
            <input type="text" name="username" placeholder="Choose a Username" id="username" class="input-field" required>
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Enter Password" id="password" class="input-field" required>
        </div>
        <div class="input-group">
            <h6 id="confirmPass" style="text-align: left;padding : 0; margin: 0;"></h6>
            <input type="password" name="confirm_password" placeholder="Confirm Password" id="Cpassword" class="input-field" required>
        </div>
        <input type="hidden" name="formType" value="signup">
        <button type="submit" class="signup-button">Create Account</button>


        <div id="errorRegisterContainer"> </div>
    </form>
</div>

<script src="public/public/js/signup.js"></script>