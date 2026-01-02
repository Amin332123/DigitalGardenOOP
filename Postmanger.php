<?php 
require_once "./Repository/userRepository.php";
session_start();
if (isset($_POST["formType"])) {
    $user = new User($_POST["fullname"], $_POST["username"], $_POST["password"], date("y-m-d"));
    var_dump($user->name);
    $UserRepo = new UserRepository();
    $UserRepo->register($user);
    $_SESSION["userName"] = $user->name;

    header("location: dashboard.php");

  }