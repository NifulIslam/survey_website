<?php
$connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    if(isset($_REQUEST["loginBtn"])){
        $id= $_REQUEST["r_id"];
        $pass= $_REQUEST["password_"];
        $query= "  SELECT * FROM researcher WHERE researcher_id ='$id' AND password_ = '$pass'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) == 1){
            // successful login

            echo '           <script>
            alert("welcome");
            </script>';

        }
        else{
            
            echo '           <script>
            alert("incorrect username or password");
            </script>';

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
</body>
</html>