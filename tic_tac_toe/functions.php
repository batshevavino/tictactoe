<?php
//הקפצת הודעה
function alert ($message){
    echo "<script type='text/javascript'>alert('$message');</script>";
}

function getPost($key){
    if(isset($_POST[$key])){
        return $_POST[$key];
    }
    return null;
}

?>