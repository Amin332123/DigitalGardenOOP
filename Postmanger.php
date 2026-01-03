<?php
require_once "./Repository/userRepository.php";
session_start();
if (isset($_POST["formType"]) && $_POST["formType"] == "signup") {
    $user = new User($_POST["fullname"], $_POST["username"], $_POST["password"], date("Y-m-d"));
    var_dump($_POST["username"]);

    $UserRepo = new UserRepository();
    $UserRepo->register($user);
    $_SESSION["userName"] = $user->name;
    $_SESSION["createdDate"] = $user->createdDate;
    header("location: dashboard.php");
}

if (isset($_POST["formType"]) && $_POST["formType"] == "login") {
    $user = new User(null, $_POST["username"], $_POST["password"], null);
    $login = new UserRepository();
    $login->login($user);
}


if (isset($_POST["STATUS"]) && $_POST["STATUS"] == "ValidateUser") {
    $userid = $_POST["id"];
    var_dump($userid);
    $userrepo = new UserRepository();
    $user = $userrepo->findById($userid);
    $user->setStatus(User::ACTIVE);
    $userrepo->updateStatus($userid, $user->status);
}
