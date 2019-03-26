<?php
require_once ("connect_db.php");
require_once ("functions.php");

//קבלת השורות
$users=selectSiim();

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

    
    <title>טבלת שיאים</title>
</head>
<body dir=rtl>

    <div class="container-fluid" style="padding: 0px 0px 100px;">
        <?php include "ticTacToeHeader.php";?> 

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover ">
                        <thead style="text-align:center">
                            <th style="text-align:center">מזהה</th>
                            <th style="text-align:center">שם משפחה</th>
                            <th style="text-align:center">שם פרטי</th>
                            <th style="text-align:center">מספר משחקים</th>
                        </thead>
                    
                        <?php foreach($users as $key=>$user):?>
                        <tr style="text-align:center">
                            <td> <?php echo $user["id"] ?></td>
                            
                            <td><?php echo $user["last_name"] ?></td>
                            
                            <td> <?php echo $user["first_name"] ?></td>

                            <td> <?php echo $user["gamesNum"] ?></td>                       
                        </tr>
                        <?php endforeach ?>
                        
                    </table>
                </div>            
            </div>
        </div>
    </div>
</body>
</html>