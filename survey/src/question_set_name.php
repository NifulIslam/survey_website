<?php
session_start();
if(isset($_SESSION['r_id']) && $_SESSION["type"] == "researcher"){
    $r_id = (int) $_SESSION["r_id"];
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    if(isset($_REQUEST['createBtn']) ){
        if( $_REQUEST['set_name']!=""){
            //getting question set id
            $query= "SELECT * FROM question_set";
            $q_s_id= (mysqli_num_rows(mysqli_query($connection, $query))  +1);
            // inserting in question set
            $query="INSERT INTO question_set (question_set_id, researcher_id) VALUES($q_s_id,$r_id)" ;
            $result =mysqli_query($connection, $query);
            if($result){
                //inserting in question set name

                $q_name= $_REQUEST['set_name'];
                $query= "INSERT INTO  question_set_name VALUES ($q_s_id,'$q_name' )";
                mysqli_query($connection, $query);
                $_SESSION["q_s_no"]= $q_s_id;
                header("Location: addQuestionSet.php?t_a=yes");
            }
            else{echo '<script>alert("an error occured");</script>';}
        }
        else{echo '<script>alert("name cannot be empty");</script>';}
    }

}
else{header("Location: researcher_profile.php");}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>question set </title>
</head>
<body>
    <form action="question_set_name.php" method= "get">
    <input type="text" name="set_name" placeholder="question set name">
    <br>
    <input type="submit" name="createBtn" value="create">
    </form>
</body>
</html>
