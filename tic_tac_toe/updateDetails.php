
<?php
require_once ("connect_db.php");
require_once ("functions.php");

session_start();

//הצגת פרטי המשתמש
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
            <div class="col-sm-3"></div>
                <div class="col-sm-6" style="text-align:center" >
                    <div class="panel panel-default panelBorder" >
                        <div class="panel-heading">
                            <div class="row panel-title">
                                <h3 >    עדכון פרטים למשתמש <?php echo $user['id'] ?> </h3>
                            </div>
                            <div class="row">
                                <h4>    רשום לאתר מתאריך <?php echo date( "d/m/Y", strtotime($user["rishumDate"]))?> </h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form method="post"  class="form-horizontal" id="formReg" role="form"   >
                                <div class=" form-group ">
                                    <label class="col-sm-3 control-label pull-right">שם פרטי: </label>
                                    <div class="col-sm-9"><input type="text" class="form-control" id="inputFN" value="<?php echo $user['first_name']?>"></div>
                                </div>    
                                <div class="form-group">
                                    <label class="col-sm-3 control-label pull-right">שם משפחה: </label>
                                    <div class="col-sm-9"><input type="text" class="form-control" id="inputLN" value="<?php echo $user['last_name']?>"></div>
                                </div>    
                                <div class="form-group">
                                    <label class="col-sm-3 control-label pull-right">דואר אלקטרוני: </label>
                                    <div class="col-sm-9"><input type="text" class="form-control" id="inputEmail" dir="ltr" value="<?php echo $user["email"]?>"></div>
                                </div>
                                
                                <div class="row"  style="text-align:center" >
                                    <button id="btn4" class="btn btn-primary"> עדכון פרטים אישיים</button>
                                    <input  id="inputId" value="<?php echo $user["id"]?>" type="hidden">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>             
        </div>
    </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../JQ/jquery.js"></script>-->
    <script src="updateScripts.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>