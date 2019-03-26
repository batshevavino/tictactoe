<?php
session_start();

require_once ("connect_db.php");
require_once ("functions.php");

if(isset($_POST['mail'])&&isset($_POST['pass'])){
    $mail=$_POST['mail'];
    $password=password_hash($_POST['pass'],PASSWORD_DEFAULT);

    $first_name=$_POST['fname'] ?? null;
    $last_name=$_POST['lname'] ?? null;

    $id=addUser($mail,$password,$first_name,$last_name);

    $_SESSION["currentUserId"]=$id;

    setcookie("currentUserId","",time()-3600);//מוחק את הערך של זיהוי משתמש
}
else alert("!!!!!!!!!!!!!!!!!!!!!!!!!!");
?>