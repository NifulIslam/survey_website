<a href='researcher_profile.php'> HOME <a>;

<form action="search_survey.php" method="get">
<input type="text" name="search" placeholder="search set name" autocomplete="off">
<input type="submit" name="btnSearch" value="search">
</form>


<?php
session_start();
if(isset($_SESSION["r_id"]) && $_SESSION["type"] == "researcher"){
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    $r_id=$_SESSION["r_id"];
    $query= "SELECT qs.question_set_id AS SET_NO , qsn.name AS question ,qs.targeted_aud_id AS ta_id FROM question_set AS qs JOIN question_set_name AS qsn ON qs.question_set_id= qsn.question_set_id WHERE qs.researcher_id =$r_id";
    $result= mysqli_query($connection, $query);
    $i=1;
    while($data= mysqli_fetch_assoc($result)){
        echo $i."->\t";
        echo $data["question"]."\t";
        $q_s= $data['SET_NO'];
        echo "<a href='history_details.php?q_s=$q_s'> expand <a>";
        echo"<label > ---------</label>";
        if(!$data["ta_id"]){
            echo "<a href='targated_aud.php?q_s=$q_s'> publish <a>"; 
            echo "<label > ---------</label>";   
        }
        echo "<a href='download_survey.php?q_s=$q_s'> download <a>";
        echo "<br><br>";
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