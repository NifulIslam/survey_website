<?php
session_start();
if(isset($_SESSION["r_id"]) && $_SESSION["type"] == "researcher" && isset($_REQUEST["q_id"])){
    $q_id= $_REQUEST["q_id"];
    $query="SELECT * FROM responce WHERE question_id=$q_id";
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    $query2= "SELECT ismcq FROM questions WHERE question_id= $q_id";
    $result= mysqli_query($connection, $query);
    $result2= mysqli_query($connection, $query2);
    $is_mcq= mysqli_fetch_assoc($result2)["ismcq"];
    
    if($is_mcq==1){
        while($data= mysqli_fetch_assoc($result)){
        
        }
    }
    else{
        while($data= mysqli_fetch_assoc($result)){
            echo "respondent id:";
            echo $data["respondent_id"];
            echo "<br>";
            echo "responce: ";
            echo $data["answer"];
            echo "<br>";
            echo "responce date:";
            echo $data["respnceDate"];
            echo"<br>";
            echo "<a href= 'add_nutral.php'> mark as nutral </a><br>";
            echo "<a href= 'add_garbage.php'> mark as garbage </a>";
            
            echo "<br>";
            echo"<br><br>";
        }
    }


}
else{ header("Location: researcher_profile.php");}

?>
<!DOCTYPE html><html lang="en"><head><title> all responces</title></head><body></body></html>