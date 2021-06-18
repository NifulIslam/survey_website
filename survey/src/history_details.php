<!-- <form action="search_qus.php" method="get">
<input type="text" name="search" placeholder="search qus name" autocomplete="off">
<input type="submit" name="btnSearch" value="search">
</form> -->



<?php
session_start();
if(isset($_SESSION["r_id"]) && $_SESSION["type"] == "researcher" && isset($_REQUEST["q_s"])){
    $q_s= $_REQUEST["q_s"];
    $query= "SELECT qus.question AS question, qus.question_id AS question_id ,qus.ismcq AS is_mcq FROM responce AS rsp JOIN questions AS qus WHERE qus.q_s_id=$q_s GROUP BY qus.question_id";
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    $result= mysqli_query($connection, $query);
    while($data= mysqli_fetch_assoc($result)){
        if($data["is_mcq"] ==1){
            echo explode("??",$data["question"])[0]."\t";
        }
        else{echo $data["question"]."\t";}
        $q_id= $data["question_id"];
        echo "<a href='check_responce.php?q_id=$q_id'> check responce <a>";
        echo "<br>";
        
    }



}
else{ header("Location: researcher_profile.php");}

?>
<!DOCTYPE html><html lang="en"><head><title> question set history</title></head><body></body></html>