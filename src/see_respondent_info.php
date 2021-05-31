<?php
session_start();
if(isset($_SESSION["r_id"]) && $_SESSION["type"] == "researcher" && isset($_REQUEST["resp_id"])){
    $resp_id= $_REQUEST["resp_id"];
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    $query="SELECT n_id, name, dob,gender, social_status,nationality FROM respondent WHERE n_id=$resp_id";
    $result=mysqli_query($connection, $query);
    $output= '<table id="ptable">
        
            <tr>
                <th>n_id</th>
                <th>name</th>
                <th>date of birth</th>
                <th>gender</th>
                <th>social status</th>
                <th>nationality</th>
                </tr>
    ';
    while($data= mysqli_fetch_assoc($result)){
        $output.='<tr>
        <th>'.$data["n_id"].'</th>
        <th>'.$data["name"].'</th>
        <th>'.$data["dob"].'</th>
        <th>'.$data["gender"].'</th>
        <th>'.$data["social_status"].'</th>
        <th>'.$data["nationality"].'</th>
        </tr>';
    }
    $output.="</table>";
    echo $output;

}
else{ header("Location: researcher_profile.php");}
?>

<!DOCTYPE html><html lang="en"><head><title> resoondent info</title></head><body></body></html>
<style>
                    #ptable{
                        width: 100%;
                        border: 1px solid blue;
                        border-collapse: collapse;
                    }
                    
                    #ptable th, #ptable td{
                        border: 1px solid blue;
                        border-collapse: collapse;
                        text-align: center;
                    }
                    
                    #ptable tr:hover{
                        background-color: bisque;
                    }
                </style>
                