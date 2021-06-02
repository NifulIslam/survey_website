<?php
session_start();
if(isset($_REQUEST["q_s"])){
    $_SESSION['q_s'] = $_REQUEST["q_s"];
}

if(isset($_SESSION['r_id']) && $_SESSION["type"] == "researcher"  ){
    $r_id = (int) $_SESSION["r_id"];
    $q_s_no=$_SESSION["q_s"] ;
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    if(isset($_REQUEST['addAudBtn'])){
        $to_reach= $_REQUEST['to_reach'];

        // getting money to publish
        $money=0;
        $query= "SELECT COUNT(*) AS mcqs FROM questions WHERE q_s_id=$q_s_no AND ismcq =1";
        $result= mysqli_query($connection,$query);
        $data=mysqli_fetch_assoc($result);
        $money+= ($data["mcqs"] *2*$to_reach) ;
        $query= "SELECT COUNT(*) AS cqs FROM questions WHERE q_s_id=$q_s_no AND ismcq =0";
        $result= mysqli_query($connection,$query);
        $data=mysqli_fetch_assoc($result);
        $money+= ($data["cqs"]*4*$to_reach);

        $query ="SELECT * FROM researcher WHERE researcher_id = '$r_id'";
        $result =mysqli_query($connection, $query);
        $data= mysqli_fetch_assoc($result);
        $balance= $data['balance'];
        echo "<script>alert('balance decucted: '$money);</script>";
        if($balance>= $money){

            
            if($to_reach!="" ){
                 // deducting balance
                 
                $query="UPDATE researcher SET balance= balance- $money WHERE researcher_id=$r_id";
                $result =mysqli_query($connection, $query);
                $resp_age= $_REQUEST['resp_age'];
                if($resp_age==""){$resp_age=null;}

                $resp_gender= $_REQUEST['resp_gender'];
                if($resp_gender=="NULL"){$resp_gender=null;}

                $resp_social_status= $_REQUEST['resp_social_status'];
                if($resp_social_status=="NULL"){$resp_social_status=null;}

                $resp_nationality= $_REQUEST['resp_nationality'];
                if($resp_nationality==""){$resp_nationality=null;}

                
                $query= "SELECT * FROM targeted_audience";
                $t_a_no= (mysqli_num_rows(mysqli_query($connection, $query))  +1);
                $query="INSERT INTO targeted_audience (targated_aud_id , resp_age, resp_gender, resp_social_statuc, resp_nationality) VALUES ('$t_a_no', '$resp_age', '$resp_gender', '$resp_social_status', '$resp_nationality')";
                $result =mysqli_query($connection, $query);
                if($result){
                    
                    $query="UPDATE  question_set SET targeted_aud_id= $t_a_no WHERE question_set_id =$q_s_no";
                    $result =mysqli_query($connection, $query);
                    $query2= "UPDATE  question_set SET to_reach= $to_reach WHERE question_set_id =$q_s_no";
                    $result2 =mysqli_query($connection, $query2);
                    if($result && $result2){
                        header("Location: survey_history.php");
                    }
                        
                }
                else{echo '<script>alert("an error occured");</script>';}
            }
            else{echo '<script>alert("to reach cannot be empty");</script>';}
        }
        else{echo '<script>alert("insufficient balance");</script>';}
        
        
    }
}
else{
    header("Location: researcher_profile.php");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add Question</title>
</head>
<body>

<form action ="targated_aud.php" method= "post">
    <input type="number" id="to_reach" name="to_reach" min="1" max="10000" placeholder= "reach">
    <input type="number" id="resp_age" name="resp_age" min="0" max="100" placeholder= "resp age">
    <select name= "resp_gender">
    <option value = "NULL"> Any </option>
    <option value = "male"> Male </option>
    <option value = "female"> Female </option>
    <option value ="others"> Others </oprion>
    </select>
    <select name= "resp_social_status">
    <option value = "NULL"> Any </option>
    <option value ="Upper_class"> Upper class </oprion>
    <option value = "lower_class"> Lower class </option>
    <option value = "middle_class"> Middle class </option>
    </select>
    <input type= "text" placeholder ="respondent's nationality" name = "resp_nationality">
    <input type= "submit" name = "addAudBtn">
</form>
    
</body>
</html>