<?php
$connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    if(isset($_REQUEST["loginBtn"])){
        $id= $_REQUEST["r_id"];
        $pass= $_REQUEST["password_"];
        $query= "  SELECT * FROM researcher WHERE researcher_id ='$id' ";

        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) == 1){
            $row= mysqli_fetch_assoc( $result);
            if(password_verify($pass,$row['PASSWORD_'])){
                session_start();
                $_SESSION['r_id'] = $id;
                $_SESSION["type"]= "researcher";
                header("Location: researcher_profile.php");}
            else{ echo ' <script> alert("incorrect  password");</script>';}
        }
       
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <form action ="researcher_login.php" method ="post">
    <input type ="text" placeholder ="researcher id" name = "r_id">
    <input type = "password" placeholder ="password" name = "password_">
    <input type = "submit" name ="loginBtn">
    </form>
    <a href="create_account.php"> create account </a>
</body>
</html>