<?php
$id= (int)$_REQUEST["r_id"];
$connection = mysqli_connect("localhost", "root", "", "ask_me_db");
echo"  <form action= 'recharge.php' mathod= 'post'> 
<input type='text' placeholder='amount' name = 'tk'>
<input type= 'submit' name='rechargeBtn' value='recharge'>
</form>";
    
    if( isset( $_REQUEST["tk"])){
       
        $amount= $_REQUEST["tk"];
        $query= "UPDATE researcher SET balance =balance+'$amount' WHERE researcher_id=$id";
        $result = mysqli_query($connection, $query);
        if($result){header("Location: researcher_profile.php?r_id='$id'");}
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recharge</title>
</head>
<body>

</body>
</html>