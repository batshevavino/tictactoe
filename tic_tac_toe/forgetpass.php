<?php
require_once ("functions.php");

$mail=getPost("mail");
if ($mail){
  alert("סליחה, האפשרות עדיין לא קיימת");
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

  <title>Tic Tac Toe</title>
</head>

<body dir="rtl" style="padding: 0px 0px 100px;">
  <div class="container-fluid" style="padding: 0px 0px 100px;">
    <?php include "ticTacToeHeader.php";?>

    <div class="row">
      <div class="col-sm-12 pull-right">
        <div style="min-height: 100px;">
          <div class="row">
            <div class="col-sm-12 pull-right">
            <div class="col-sm-2 ">
            </div>
              <div class="col-sm-8 panel panel-default  panelBorder" style="padding:0px">
                <div class="panel-heading ">
                  <h3 class="panel-title"> שכחתי סיסמא</h3>
                </div>
                <div class="panel-body">
                  <center><br />
                    על מנת לאפס את סיסמתך נא הקלד את הדואר האלקטרוני שאיתו נרשמת למשחקים ולחץ על שחזר סיסמא. <br />לאחר
                    מכן הכנס לדוא"ל שלך ולחץ על הקישור שנשלח אליך.<br /></br />
                    <form method="post" action="" class="form-horizontal" role="form">
                      <div class="col-sm-10" style="text-align:center" >
                        <div class="form-group" style="text-align:center" >
                          <label class="col-sm-3 control-label pull-right">דואר אלקטרוני: <font color="red">*</font></label>
                          <div class="col-sm-6 pull-right" ><input type="text" id="mail" name="mail" class="form-control"></div>
                        </div>
                        <div class="col-sm-6"></div>
                        <div class="form-group col-sm-3 " style="text-align:center">                
                          <button type="submit" class="btn btn-primary " onClick="this.innerHTML='סליחה, האפשרות עדיין לא קיימת'">שחזר
                          סיסמא</button>
                        </div>
                      </div>
                    </form>
                  </center>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>