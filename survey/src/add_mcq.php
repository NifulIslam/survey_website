<?php
session_start();
if(isset($_SESSION['r_id']) && $_SESSION["type"] == "researcher"){
    $q_s_id=$_SESSION['q_s_no'] ;
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    if(isset($_REQUEST['addQusBtn'])){
        $r_id= $_SESSION["r_id"];

        $query ="SELECT * FROM researcher WHERE researcher_id = '$r_id'";
        $result =mysqli_query($connection, $query);
        $data= mysqli_fetch_assoc($result);
        $balance= $data['balance'];
        
    
        $question= $_REQUEST['question'];
        $option1= $_REQUEST['option1'];
        $option2= $_REQUEST['option2'];
        $option3= $_REQUEST['option3'];
        $option4= $_REQUEST['option4'];

        if($question!="" &&$option1!="" &&$option2!="" &&$option3!="" &&$option4!=""){
            $question= $question."??".$option1."__".$option2."__".$option3."__".$option4;
            //getting the question no.
            //autometic at auto increment
            $query= "SELECT * FROM questions";
            $q_no= (mysqli_num_rows(mysqli_query($connection, $query))  +1);
            
            // adding question
            $query= "INSERT INTO questions (question_id , ismcq,  question, weight, q_s_id ) VALUES('$q_no', 1, '$question', 1, '$q_s_id')";
            $result = mysqli_query($connection, $query);
            
            if($result){
                header("Location: addQuestionSet.php?t_a=yes");
            }
            else{echo '<script>alert("an error coccured!");</script>';}    
        }
        else{echo '<script>alert("question and options cannot be empty!");</script>';}
    
        
    }
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add mcq</title>
</head>
<body>
    <form action="add_mcq.php" method= 'get'>
    <input type= "text" id='textboxid' name= "question" placeholder ="question" id="question">
    <br>
    <input type= "text" id='opt' name= "option1" placeholder ="option 1" >
    <input type= "text" id='opt' name= "option2" placeholder ="option 2" >
    <input type= "text" id='opt' name= "option3" placeholder ="option 3" >
    <input type= "text" id='opt' name= "option4" placeholder ="option 4" >
    <br><br>
    <input type= "submit" id='btn' name= "addQusBtn" value= "add">
    <form>
</body>
</html>

<style>
#textboxid
{
    height:40px;
    font-size:24pt;
}
#opt
{
    height:20px;
    font-size:14pt;
}
#btn
{
    height:30px;
    font-size:15pt;
}