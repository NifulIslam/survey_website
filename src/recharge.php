<?php
session_start();

$id= (int) $_SESSION["r_id"];
$connection = mysqli_connect("localhost", "root", "", "ask_me_db");
echo"  <form action= 'recharge.php' mathod= 'post'> 
<input type='text' placeholder='amount' name = 'tk'>
<input type= 'submit' name='rechargeBtn' value='recharge'>
</form>";
    
    if( isset( $_REQUEST["tk"])){
       
        $amount= $_REQUEST["tk"];
        $query= "UPDATE researcher SET balance =balance+'$amount' WHERE researcher_id=$id";
        $result = mysqli_query($connection, $query);
        $query2= "INSERT INTO recharge (amount, researcher_id) VALUES ($amount, $id);";
        $result2 = mysqli_query($connection, $query2);
        
        if($result && $result2){header("Location: researcher_profile.php");}
        else{echo '<script>alert("an error occured!");</script>';}
    
}
?>


<head>
    <title>Recharge</title>
</head>
