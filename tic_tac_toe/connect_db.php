<?php
require_once ("functions.php");

$_CONNECTION=null;
function getConnection()
{
    global $_CONNECTION;
    if(!$_CONNECTION)
    {  //שלב 1 יצירת הקשר
        $dbtask = "root";
        $dbPass = "";
       
        try {
            $_CONNECTION = new PDO("mysql:host=localhost;dbname=tictactoe", $dbtask, $dbPass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        } catch (PDOException $e) {
            throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
            print "Error!: " . $e->getMessage();
            die();
        }
       
    }
    return $_CONNECTION;
}

//-----------------------------------------------------------------------------------------------------------
//פונקציה להוספת משתמש
function addUser($email,$password,$first_name,$last_name)
{
    $email=stripunwanted($email);
    //$password=stripunwanted($password);
    $first_name=stripunwanted($first_name);
    $last_name=stripunwanted($last_name);
  
    $connection=getConnection();
    
    $sql = "INSERT INTO `users` (`email`,`password`,`first_name`,`last_name`)";
    $sql .= " VALUES ('$email','$password','$first_name','$last_name')";

    $query = $connection -> prepare($sql);

  try{
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query -> execute();
} catch (PDOException $e) {
    if ((int)$e->getCode( )==23000) echo ("23000");
    die();
}

    
    echo ($connection->lastInsertId()>0)? $connection->lastInsertId():"unsuccessful";
    return $connection->lastInsertId();
}
//-----------------------------------------------------------------------------------------------------------
//פונקציה לעדכון פרטי משחקים של משתמש
function updateUser($id,$win,$loss,$teko)
{
    $connection=getConnection();

    $sql = "UPDATE `users` SET `teko`='$teko',`loss`='$loss',`win`='$win' WHERE `id`='$id'";

    $query = $connection -> prepare($sql);

    try{
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query -> execute();
        }
    catch (PDOException $e) {
        echo ("Error!: " .$e->getMessage());
        die();
        }

}

//-----------------------------------------------------------------------------------------------------------
//פונקציה לעדכון פרטים אישיים של משתמש

function updateUserDetails($id,$first_name,$last_name,$email)
{
    $connection=getConnection();

    $sql = "UPDATE `users` SET `first_name`='$first_name',`email`='$email',`last_name`='$last_name' WHERE `id`='$id'";

    $query = $connection -> prepare($sql);

    try{
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query -> execute();
        }
    catch (PDOException $e) {
        echo ("Error!: " .$e->getMessage());
        die();
        }

}

//-----------------------------------------------------------------------------------------------------------
//פונקציה לשליפת פרטי משתמש לפי מזהה
function selectUserId($id)
{
    //יצירת שאילתא
    $sql="SELECT *,`win`+`loss`+`teko` as gamesNum FROM `users` WHERE `id`='$id'";
    return(selectUser($sql));
}
//-----------------------------------------------------------------------------------------------------------
//פונקציה לשליפת פרטי משתמש לפי אימייל
function selectUserEmail($email)
{
    //יצירת שאילתא
    
    $sql="SELECT * FROM `users` WHERE `email`='$email'";
   
    return(selectUser($sql));
}

//פונקציה לשליפת פרטי משתמש
function selectUser($sql){

    $connection=getConnection();

    $query =  $connection -> prepare($sql);
    try{
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query -> execute();
        } catch (PDOException $e) {
            echo ((int)$e->getCode( ));
            die();
        }

        $result = $query -> fetcH();
        if($query -> rowCount() > 0){    
            return($result);}
        return null;
}

//-----------------------------------------------------------------------------------------------------------
//פונקציה לשליפת פרטי משתמשים לטבלת שיאים  
function selectSiim()
{
    //יצירת שאילתא
    $sql="SELECT id,first_name,last_name,`win`+`loss`+`teko` as gamesNum FROM `users` ORDER BY gamesNum DESC";
    $connection=getConnection();

    $query =  $connection -> prepare($sql);

    $query -> execute();

    $results = $query -> fetchAll(PDO::FETCH_ASSOC);

    if($query -> rowCount() > 0){

        return($results);
    }
}

//-----------------------------------------------------------------------------------------------------------
//פונקציה לשליפת כל משתמשים
function selectUsers()
{
    //יצירת שאילתא
    $sql="SELECT * FROM `users` ORDER BY `id`";
    $connection=getConnection();

    $query =  $connection -> prepare($sql);

    $query -> execute();

    $results = $query -> fetchAll(PDO::FETCH_ASSOC);

    if($query -> rowCount() > 0){

        $count = $query -> rowCount();

        echo "Number of users: " . $count;

        return($results);

    }
}
//-----------------------------------------------------------------------------------------------------------
//הפונקציה מסלקת תווים שאיננו מעוניינים שיוכנסו למסד הנתונים

function stripunwanted($text){

    return preg_replace('/[^a-zA-Zא-ת0-9@. -]/', '', $text);
  
  }
  
?>