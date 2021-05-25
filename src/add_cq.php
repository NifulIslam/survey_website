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
        if($balance>=4){
            $question= $_REQUEST['question'];

            if($question!=""){
                //getting the question no.
                //autometic at auto increment
                $query= "SELECT * FROM questions";
                $q_no= (mysqli_num_rows(mysqli_query($connection, $query))  +1);

                // adding question
                $query= "INSERT INTO questions (question_id , ismcq,  question, weight, q_s_id ) VALUES('$q_no', 0, '$question', 2, '$q_s_id')";
                $result = mysqli_query($connection, $query);
                if($result){
                    
                    //deducting balance
                    $query= "UPDATE researcher SET balance = balance -4 WHERE researcher_id=$r_id ";
                    mysqli_query($connection, $query);
                    
                    echo '<script>alert("added successfully!");</script>';
                    header("Location: addQuestionSet.php?t_a=yes");
                }
            }
            else{echo '<script>alert("question cannot be empty!");</script>';}
        }
        else{echo '<script>alert("insufficient balance!");</script>';}
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add cq</title>
</head>
<body>
<form action="add_cq.php" method= 'get'>
    <input type= "text" name= "question" placeholder ="question" id="question">
    <br>
    <input type= "submit" name= "addQusBtn" value= "add">
    <form>

</body>
</html>