<?php
$n_id=3 ;//(int) $_REQUEST["n_id"];
$connection = mysqli_connect("localhost", "root", "", "ask_me_db");
echo"  <form action= 'withdraw.php' mathod= 'post'> 
<input type='text' placeholder='amount' name = 'tk'>
<input type= 'submit' name='withdrawBtn' value='withdraw'>
</form>";
    
    if( isset( $_REQUEST["withdrawBtn"])){
        $query = "SELECT * FROM respondent WHERE   n_id = '$n_id'";
        $result = mysqli_query($connection, $query);
        $data= mysqli_fetch_assoc($result);
        if($data["balance"]>=$_REQUEST["tk"]){
            $amount= $_REQUEST["tk"];
            $query= "UPDATE respondent SET balance =balance-'$amount' WHERE n_id=$n_id";
            $result = mysqli_query($connection, $query);
            if($result){header("Location: respondent_profile.php");}
        }
        else{
            echo "<script>
            alert('insufficient balance')
            </script>";
        }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>withdraw money </title>
</head>
<body>
    
</body>
</html>