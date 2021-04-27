<?php

if(isset($_REQUEST["addansBtn"])){
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    $q_id= $_REQUEST["q_id"];
    $n_id = $_REQUEST["n_id"];
    $ans = $_REQUEST["ans"];

    $query= "INSERT INTO responce (respondent_id, question_id, answer)  VALUES ('$n_id' , '$q_id', '$ans');";
    $result = mysqli_query($connection, $query);
    $query ="UPDATE  questions SET to_reach = to_reach-1 WHERE question_id= '$q_id'";
    $result = mysqli_query($connection, $query);
    $query = "UPDATE respondent SET balance = balance +1 WHERE n_id ='$n_id'";
    $result = mysqli_query($connection, $query);
    header("Location: resondent_dashbord.php?n_id='$n_id'");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add answer</title>
</head>
<body>
<form  method = "post">
    <input type= 'text' placeholder= 'answer' name = 'ans'>
    <input type = 'submit' name = 'addansBtn'>

</form>
    
</body>
</html>