<?php
session_start();
if(isset($_SESSION["r_id"]) && $_SESSION["type"] == "researcher"){
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    $r_id=$_SESSION["r_id"];
    $query= "SELECT qset.question_set_id AS SET_NO ,qus.question AS question FROM responce AS resp JOIN questions AS qus ON resp.question_id= qus.question_id JOIN question_set AS qset ON qus.q_s_id= qset.question_set_id WHERE qset.researcher_id= $r_id GROUP BY qset.question_set_id";
    $result= mysqli_query($connection, $query);
    $i=1;
    while($data= mysqli_fetch_assoc($result)){
        echo $i."->\t";
        echo $data["question"]."\t";
        $q_s= $data['SET_NO'];
        echo "<a href='history_details.php?q_s=$q_s'> expand <a>";
        echo "<br>";
        $i+=1;
    }
}
else{ header("Location: researcher_profile.php");}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>survey history</title>
</head>
<body>
</body>
</html>