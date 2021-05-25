<?php 
session_start();
if(isset($_SESSION["r_id"]) && $_SESSION["type"] == "researcher"){
    $r_id=(int) $_SESSION["r_id"];
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    if(isset($_REQUEST["saveBtn"])){
        if($_REQUEST["company_name"]!=""){
            $company= $_REQUEST["company_name"];
            $query = "UPDATE researcher SET company = '$company' WHERE researcher_id =$r_id";
            $result=mysqli_query($connection, $query);
        }
        if($_REQUEST["email_"]!=""){
            $email_= $_REQUEST["email_"];
            $query = "UPDATE researcher SET email = '$email_' WHERE researcher_id =$r_id";
            $reslut=mysqli_query($connection, $query);
        }
        header("Location: researcher_profile.php");
    }
}
else{ header("Location: researcher_profile.php");}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>edit profile</title>
</head>
<body>
<form action = "edit_profile.php" mathod="get">
    
    <input type= "text" name= "company_name" placeholder= "company name">
    <br>
    <input type= "email" name= "email_" placeholder ="x@gmail.com">
    <input type= "submit" value= "save" name ="saveBtn">

<from>
</form>    
</body>
</html>