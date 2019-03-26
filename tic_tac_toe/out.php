<?php 
session_start();
session_unset();
session_destroy();
setcookie("currentUserId","",time()-3600);//מוחק את הערך של זיהוי משתמש
?>
