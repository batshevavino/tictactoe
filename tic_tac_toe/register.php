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
    <div class="row" >
        <div class="col-sm-3" ></div>
        <div class="col-sm-8 ">
            <div class="row">
             
                <div class="panel panel-default col-sm-8 panelBorder"  style="padding:0px" >
                    <div class="panel-heading panelBorder ">
                            <h3 class="panel-title"> הרשמה למשחקים</h3>
                    </div>
                    <div class="panel-body" >

                        <form method="post"  class="form-horizontal" id="formReg" role="form"   >
                            <div class="col-sm-12 " >
                                <div class="form-group">
                                    <label class="col-sm-4 control-label pull-right ">דואר אלקטרוני: <font color="red">*</font></label>
                                    <div class="col-sm-8"><input type="text" id="mail1" required class="form-control " dir="ltr" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label  pull-right">אמת דואר אלקטרוני: <font color="red">*</font></label>
                                    <div class="col-sm-8"><input type="text" id="mail2" required class="form-control" dir="ltr" ></div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-4 control-label pull-right ">סיסמא: <font color="red">*</font></label>
                                    <div class="col-sm-8"><input type="password" id="password1" required class="form-control" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label pull-right ">אמת סיסמא : <font color="red">*</font></label>
                                    <div class="col-sm-8"><input type="password" id="password2" required class="form-control" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label pull-right ">שם פרטי: </label>
                                    <div class="col-sm-8"><input type="text" id="fname" class="form-control" ></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label pull-right ">שם משפחה: </label>
                                    <div class="col-sm-8"><input type="text" id="lname" class="form-control" ></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <input type="hidden" id="id" value="-1">
                                        <button type="submit" class="btn btn-primary" >הרשם לאתר</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>               
            </div>
        </div> 
    </div>
</div>  

 
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

    <script src="../JQ/jquery.js"></script>
    <script src="registerScripts.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>


    
</body>
</html>
