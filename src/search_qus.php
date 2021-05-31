<?php
session_start();
if(isset($_SESSION["r_id"]) && $_SESSION["type"] == "researcher" && isset($_REQUEST["q_s"])){
    $q_s= $_REQUEST["q_s"];
    $search= $_REQUEST["search"];
    $query= "SELECT qus.question AS question, qus.question_id AS question_id ,qus.ismcq AS is_mcq FROM responce AS rsp JOIN questions AS qus WHERE qus.q_s_id=$q_s GROUP BY qus.question_id";
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    $result= mysqli_query($connection, $query);
    $found=0;
    while($data= mysqli_fetch_assoc($result)){
        if($data["is_mcq"] ==1){
            if(str_contains($data["question"][0] , $search )){
                echo explode("??",$data["question"])[0]."\t";
                $found= 1;
            }
        }
        else{
            if(str_contains($data["question"] , $search )){
                echo $data["question"]."\t";
             }
        }
        if($found){
            $q_id= $data["question_id"];
            echo "<a href='check_responce.php?q_id=$q_id'> check responce <a>";
            echo "<br>";
            $found=0;
        }
        
    }



}
else{ header("Location: researcher_profile.php");}
