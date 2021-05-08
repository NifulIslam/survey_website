<?php
$connection = mysqli_connect("localhost", "root", "", "ask_me_db");
if(isset($_REQUEST["createBtn"])){
    $n_id= $_REQUEST["n_id"];
    $name= $_REQUEST["name"];
    $password_= $_REQUEST["password_"];
    $dob= $_REQUEST["dob"];
    $gender =$_REQUEST["gender"];
    $socialst= $_REQUEST["social_status"];
    $nationality = $_REQUEST["nationality"];
    if($n_id !="" && $name !="" && strlen($password_)>6 && $dob!=NULL && $nationality!=""){
        $query = "INSERT INTO respondent (n_id,name,PASSWORD_,dob,gender,social_status,nationality) VALUES ('$n_id', '$name', '$password_', '$dob' ,'$gender', '$socialst', '$nationality') ";
        $result = mysqli_query($connection, $query);
        if($result){
            echo '           <script>
        alert("account created");
        </script>';
        }
        else{
            header ("Location: create_respond_account.php?unsuccess='y'");
        }
    }
    else{
        echo '           <script>
        alert("invalid data");
        </script>';

    }    
}
if(isset($_REQUEST["unsuccess"])){
    echo '           <script>
        alert("invalid nid");
        </script>';

}



?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create accouunt</title>
</head>
<body>
    <form action ="create_respond_account.php" method = "post">
    <input type = "text" placeholder = "national id no" name = "n_id">
    <input type = "text" placeholder = "name" name = "name">
    <input type = "password" placeholder = "password" name = "password_">
    <input type= "date" name= "dob">
    <select name= "gender">
    <option value = "male"> Male </option>
    <option value = "female"> Female </option>
    <option value ="others"> Others </oprion>
    </select>
    <select name= "social_status">
    <option value ="Upper_class"> Upper class </oprion>
    <option value = "lower_class"> Lower class </option>
    <option value = "middle_class"> Middle class </option>
    </select>
    <input type= "text" placeholder= "nationality" name= "nationality">
    <input type= "submit" name = "createBtn">

    </form>
</body>
</html>