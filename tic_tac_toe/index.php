<?php 
include "connect_db.php";
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
    <!--הזדהות -->

    <div class="col-sm-4" ></div>
    <div class="col-sm-4 text-center " style="margin: auto; ">
      <div class="panel panel-default panelBorder" >
        
        <div class="panel-heading">
          <h3 class="panel-title"> כניסה למשחקים</h3>        
        </div>

           <div class="panel-body">
            <form class="form-horizontal" id="formSignin" role="form" method="post" >
              <div class="form-group">
                <div class="col-xs-12 centered">

                  <input type="text" class="form-control form-group" placeholder="אימייל משתמש" name="username" id="email">
                  <input type="password" class="form-control form-group" placeholder="סיסמא" name="password1" id="password1">
              
                  <input name="remember" id="remember" type="checkbox" value="yes"> זכור אותי <br><br>
                  <button type="submit" class="btn btn-primary">הכנס</button><br />
                  <a href="register.php">לחץ כאן להרשמה לאתר</a><br />
                  <a href="forgetpass.php" class="linkCatLit">שכחתי סיסמא</a>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="../JQ/jquery.js"></script>-->
  <script src="signin.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/bootstrap.min.js"></script>

</body>

</html>