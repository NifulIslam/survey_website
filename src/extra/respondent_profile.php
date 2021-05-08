<?php
$n_id= 1;
$connection = mysqli_connect("localhost", "root", "", "ask_me_db");
$query = "SELECT * FROM respondent WHERE   n_id = '$n_id'";
$result = mysqli_query($connection, $query);
$data= mysqli_fetch_assoc($result);
echo $data['n_id'];
echo "<br>";

echo $data['name'];
echo "<br>";

echo $data['dob'];
echo "<br>";

echo $data['gender'];
echo "<br>";

echo $data['social_status'];
echo "<br>";

echo $data['nationality'];
echo "<br>";


echo $data['nutral_count'];
echo "<br>";

echo $data['garbage_count'];
echo "<br>";

echo $data['balance'];
echo "<br>";
$link = "withdraw.php?n_id=";
$link .= $n_id;
echo "<a href= '$link'> withdraw </a>"




?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>respondent profile</title>
</head>
<body>
    
</body>
</html>