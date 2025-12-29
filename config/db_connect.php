<?php
$host = "sql306.infinityfree.com";    
$db = "if0_40733773_digitalgardenprojects";    
$user = "if0_40733773";           
$pass = "mRy2tPjTVssL";              

$conn =  mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " .  mysqli_connect_error());
}
?>