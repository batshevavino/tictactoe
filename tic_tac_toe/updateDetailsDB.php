<?php
session_start();

require_once ("connect_db.php");
require_once ("functions.php");

if(isset($_POST['first_name'])&&isset($_POST['last_name'])&&isset($_POST['email'])&&isset($_POST['id'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $id=$_POST['id'];
    updateUserDetails($id,$first_name,$last_name,$email);
}
else alert("בעיה בעדכון: נתונים חסרים");
?>
        