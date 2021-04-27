<?php
    $id= 1;
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    $query= "SELECT * FROM respondent WHERE n_id = '$id'";
    $result = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($result);
$r_gend= $result['gender'];
$r_sc= $result['social_status'];
$r_nat = $result['nationality'];
    $query= "SELECT DATEDIFF(CURDATE() , dob) DIV 365 AS AGE FROM respondent WHERE n_id ='$id'";
    $result = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($result);
$r_age=  $result['AGE'];

$query ="SELECT * FROM questions WHERE (resp_age=0 OR resp_age = '$r_age') AND (resp_gender= 'NULL' OR resp_gender= '$r_gend') AND (resp_social_statuc= 'NULL' OR resp_social_statuc = '$r_sc') AND  (resp_nationality ='' OR resp_nationality= '$r_nat') AND to_reach !=0";
$result = mysqli_query($connection, $query);
while($row =  mysqli_fetch_assoc($result)){
    echo $row['question'] ;
    $page = "add_responce.php?q_id=";
    $page.= $row['question_id'];
    $page .= "&& n_id=";
    $page .= $id= 1;
    
    echo " <a href= '$page'> add ans <a>";
    echo "<br>";
}

?>