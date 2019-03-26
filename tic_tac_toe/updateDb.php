<?php
session_start();

require_once ("connect_db.php");
require_once ("functions.php");

if(isset($_POST['win'])&&isset($_POST['loss'])&&isset($_POST['teko'])&&isset($_POST['id'])){
    $win=$_POST['win'];
    $loss=$_POST['loss'];
    $teko=$_POST['teko'];
    $id=$_POST['id'];
    updateUser($id,$win,$loss,$teko);
}
else alert("בעיה בעדכון: נתונים חסרים");
?>