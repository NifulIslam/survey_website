<?php
$connection = mysqli_connect("localhost", "root", "", "ask_me_db");
$id= 1; //$_REQUEST["r_id"]
if(isset($_REQUEST["addqusBtn"])){
    $question= $_REQUEST["ques"];
    $ismcq= $_REQUEST["ismcq"];
    $to_reach =(int)$_REQUEST["to_reach"];
    $resp_age = $_REQUEST["resp_age"];
    $resp_gender= $_REQUEST["resp_gender"];
    $resp_social_status= $_REQUEST["resp_social_status"];
    $resp_nationality= $_REQUEST["resp_nationality"];
    if($question!="" && $to_reach!=0){
        $res_query= "SELECT * FROM researcher WHERE researcher_id = '$id'";
        $result= mysqli_query($connection, $res_query);
        $result= mysqli_fetch_assoc($result);
        if($result["balance"]>=2*$to_reach){
            $query = "INSERT INTO  questions (researcher_id , ismcq, to_reach ,question ,resp_age, resp_gender, resp_social_statuc, resp_nationality) VALUES ('$id', '$ismcq','$to_reach','$question','$resp_age','$resp_gender','$resp_social_status','$resp_nationality')";
            $result = mysqli_query($connection, $query);
            
            if($result){
                echo '           <script>
                alert("question added");
                </script>';
            } 
            $query= "UPDATE researcher SET balance = balance- 2* '$to_reach' WHERE researcher_id='$id'";
            $result = mysqli_query($connection, $query);
    }
    else{
        echo '           <script>
        alert("insufficient balance");
        </script>';
    
    }  
    }
    else{
        
        echo '           <script>
        alert("invalid data ");
        </script>';
    }

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
<form action ="add_ques.php" method= "post">
    <input type ="text" placeholder="question" name ="ques">
    <select name="ismcq">
    <option value="0"> NO </option>
    <option value="1"> YES </option>
    </select>
    <input type= "text" placeholder ="reach" name= "to_reach">
    <input type= "text" placeholder ="respondent's age" name = "resp_age">
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
    <input type= "submit" name = "addqusBtn">




</form>
    
</body>
</html>