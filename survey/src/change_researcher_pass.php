<?php
session_start();
if( $_SESSION["type"] == "researcher"){
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    $r_id=(int)$_SESSION["r_id"];
    if(isset($_REQUEST["saveBtn"])){
        $oldPass= $_REQUEST["oldPass"];
        $query= "SELECT * FROM  researcher WHERE researcher_id = '$r_id'";
        $result= mysqli_query($connection, $query);
        $row= mysqli_fetch_assoc($result);
        if(password_verify($oldPass,$row['PASSWORD_']) ){        
            if( $_REQUEST['newPass']==$_REQUEST['newPass2'] && strlen($_REQUEST['newPass'])>6){
                $hashPass= password_hash($_REQUEST["newPass"], PASSWORD_DEFAULT);
                $query= "UPDATE researcher SET PASSWORD_= '$hashPass' WHERE researcher_id = '$r_id'";
                $result= mysqli_query($connection, $query);
                if($result){echo '<script>alert(" password changed!");</script>';
                header("Location: researcher_profile.php");
                }
                else{echo '<script>alert(" cannot change password!");</script>';}
            }
            else{
                echo '<script>alert("incorrect new password");</script>';
            }
        }
        else{
            echo '<script>alert("incorrect old password");</script>';
        }
    }
}
else{
    header("Location: researcher_profile.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
</head>
<body>
    <form action ="change_researcher_pass.php" method= "post">
        <input type="password" placeholder= "old password" id= "oldPass" name= "oldPass">
        <input type="password" placeholder= "new password" id= "newPass" name= "newPass">
        <input type="password" placeholder= "new password" id= "newPass2" name= "newPass2">
        <input type= "submit"  name = "saveBtn" value= "save">
    <form>
</body>
</html>