<?php
require_once ("connect_db.php");
require_once ("functions.php");

session_start();

$user=null;
//בדיקה אם המשתמש כבר מחובר
$id=$_POST['id'] ?? null;
if ($id==null)
    {$id=$_SESSION["currentUserId"] ?? null;
     if ($id==null)
        {$id=$_COOKIE["currentUserId"] ?? null;}
    }
if ($id){
        $user=selectUserId($id);//שליפת פרטי המשתמש
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="tictactoeStyle.css">

    <title>משחק איקס עיגול</title>
</head>
<body dir="rtl" style="padding: 0px 0px 50px; ">
  
    <div class="container-fluid" style="padding: 0px 0px 100px;">
        <?php include "ticTacToeHeader.php";?> 

        <div class="row">
            <div class="col-sm-4" style="text-align:center" >
                <?php if ($id):?>
                    <div class="row">
                        <h2>    ברוך הבא <?php echo $user['first_name']," ", $user['last_name']?> </h2>
                    </div>
                    <div class="row">
                        <h3>   אתה רשום לאתר מתאריך <?php echo date( "d/m/Y", strtotime($user["rishumDate"]))?> </h3>
                    </div>
                    <div class="row">
                        <div  style="text-align:center" >
                            <h4>   מספר משחקים עד היום <font color="red"> <?php echo $user["gamesNum"]?> </font>  </h4>
                        </div>
                        <div  style="text-align:center">
                            <h4> מספר נצחונות <font color="red"> <?php echo $user["win"]?> </font> </h4>
                        </div>
                    </div>
                    <div class="row">
                        
                    </div>
                    <div class="row">
                        <div  style="text-align:center" >
                            <h4> מספר הפסדים <font color="red"> <?php echo $user["loss"]?> </font> </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div  style="text-align:center">
                            <h4>   סיימת בתיקו <font color="red"> <?php echo $user["teko"]?> </font> </h4>
                        </div>
                    </div>
                    <div class="row"  style="text-align:center" >
                        <button id="btn3" class="btn btn-primary"> עדכון פרטים אישיים</button>
                    </div> 
                <?php else:?>   
                <div class="row">
                        <h2> ברוך הבא שחקן חופשי </h2>
                    </div>             
                <?php endif ?>
            </div>  
                
            <div class="col-sm-4" style="text-align:center">
                <div class="row">
                    <button id="btn1" class="btn btn-primary"> התחל משחק</button>
                    <button id="btn2" class="btn btn-primary"> צא </button>
                </div>
                <div class="row">
                    <img class="cardi" id="0">
                    <img class="cardi" id="1">
                    <img class="cardi" id="2">
                </div>
                <div class="row" >    
                    <img class="cardi" id="3">
                    <img class="cardi" id="4">
                    <img class="cardi" id="5">
                </div>
                <div class="row">
                    <img class="cardi" id="6">
                    <img class="cardi" id="7">
                    <img class="cardi" id="8">
                </div>
            </div>
            <div class="col-sm-4" style="text-align:center" >    
                <?php if ($id):?>     
                    <div>
                        <input  id="inputId" value="<?php echo $user["id"]?>" type="hidden">
                        <input  id="inputWin" value="<?php echo $user["win"]?>" type="hidden">
                        <input  id="inputLoss" value="<?php echo $user["loss"]?>" type="hidden">
                        <input  id="inputTeko" value="<?php echo $user["teko"]?>" type="hidden"> 
                    </div>
                <?php else: ?>
                    <div>
                        <input  id="inputId" value="0" type="hidden">
                    </div>
                <?php endif ?>

            </div>
        </div>
    </div>
   
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <script src="../JQ/jquery.js"></script>
    <script src="tictactoescripts.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>