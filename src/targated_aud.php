<?php
$connection = mysqli_connect("localhost", "root", "", "ask_me_db");
if(isset($_REQUEST['addAudBtn'])){
    $to_reach= $_REQUEST['to_reach'];
    if($to_reach!="" ){
        $resp_age= $_REQUEST['resp_age'];
        if($resp_age==""){$resp_age=null;}

        $resp_gender= $_REQUEST['resp_gender'];
        if($resp_gender=="NULL"){$resp_gender=null;}

        $resp_social_status= $_REQUEST['resp_social_status'];
        if($resp_social_status=="NULL"){$resp_social_status=null;}

        $resp_nationality= $_REQUEST['resp_nationality'];
        if($resp_nationality==""){$resp_nationality=null;}

        $t_a_no=0;
        $query= "SELECT * FROM targeted_audience";
        $t_a_no= (mysqli_num_rows(mysqli_query($connection, $query))  +1);
        $query="INSERT INTO targeted_audience (targated_aud_id , resp_age, resp_gender, resp_social_statuc, resp_nationality) VALUES ('$t_a_no', '$resp_age', '$resp_gender', '$resp_social_status', '$resp_nationality')";
        $result =mysqli_query($connection, $query);
        if($result){echo "added";}
    }
    else{echo '<script>alert("to reach cannot be empty");</script>';}
    
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