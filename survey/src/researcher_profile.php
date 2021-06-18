<?php
session_start();

if(isset($_SESSION['r_id']) && $_SESSION["type"] == "researcher")
{
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    $r_id = (int)$_SESSION['r_id'];

    




    $query = "SELECT * FROM researcher WHERE researcher_id = '$r_id'";
    $result= mysqli_query($connection , $query);
    $data= mysqli_fetch_assoc($result);
    echo $data["name"];
    echo"<br>id: ";
    echo $data["researcher_id"];
    echo"<br>company: ";
    echo $data["company"];
    echo"<br>email: ";
    echo $data["email"];
    echo"<br>balance: ";
    echo $data["balance"];

    if(isset($_REQUEST["rechargeBtn"])){
        header("Location: recharge.php");
    }
    if(isset($_REQUEST["logoutBtn"])){
        header("Location: researcher_logout.php");
    }
}
else{
    
     header("Location: researcher_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>researcher profile</title>
</head>
<body>
    <form action ="researcher_profile.php" mathod = "post">
    <input type = "submit" name ="rechargeBtn" value="recharge">
    <input type = "submit" name ="logoutBtn" value="log out">
    </form>

    <a href= "change_researcher_pass.php" > change password </a>
    <br>
    <a href= "addQuestionSet.php" > add question </a>
    <br>
    <a href= "edit_profile.php" > edit profile </a>
    <br>
    <a href= "survey_history.php" > history </a>

</body>
</html>