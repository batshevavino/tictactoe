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
        <div class="col-sm-12 ">
          <div style="min-height: 100px;">
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <div class="panel panel-default panel-danger">
                  <div class="panel-heading">
                    <h3 class="panel-title"> כניסה לאיקס עיגול</h3>
                  </div>
                  <div class="panel-body">
                    <center><br />
                      <h2>שם המשתמש או הסיסמא שהזנת אינם נכונים</h2>
                      <br /><a href="index.php">נסה/י שוב</a>
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