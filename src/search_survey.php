<?php
session_start();
if(isset($_SESSION["r_id"]) && $_SESSION["type"] == "researcher" && isset($_REQUEST["btnSearch"])){
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    $r_id=$_SESSION["r_id"];
    $search= $_REQUEST["search"];
    $query= "SELECT qs.question_set_id AS SET_NO , qsn.name AS question FROM question_set AS qs JOIN question_set_name AS qsn ON qs.question_set_id= qsn.question_set_id WHERE qs.researcher_id =$r_id AND qsn.name = '$search'";
    
    $result= mysqli_query($connection, $query);
    $i=1;
    while($data= mysqli_fetch_assoc($result)){
        echo $i."->\t";
        echo $data["question"]."\t";
        $q_s= $data['SET_NO'];
        echo "<a href='history_details.php?q_s=$q_s'> expand <a>";
        echo"<label > ---------</label>";
        echo "<a href='download_survey.php?q_s=$q_s'> download <a>";
        echo "<br><br>";
        $i+=1;
    }
}
else{ header("Location: researcher_profile.php");}
?>
