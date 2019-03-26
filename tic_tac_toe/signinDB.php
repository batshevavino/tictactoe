<?php
session_start();

require_once ("connect_db.php");
require_once ("functions.php");

if(isset($_POST['mail'])&&isset($_POST['pass'])){
        
    $user=selectUserEmail($_POST['mail']);

    if ($user){
      
    //בדיקת התאמת הסיסמה
    
        if(password_verify($_POST['pass'],$user["password"])){
            echo ('5');//ברוך הבא
            $_SESSION["currentUserId"]=$user["id"];
            if (isset($_POST['remember'])){setcookie("currentUserId",$user["id"],time()+60*60*24*30);}

        }
        else { echo("6");}//סיסמה שגויה

    }
    else
     echo ("7"); //משתמש לא קיים
}
else alert("!!!!!!!!!!!!!!!!!!!!!!!!!!");
?>