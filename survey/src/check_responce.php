<?php
session_start();
if(isset($_SESSION["r_id"]) && $_SESSION["type"] == "researcher" && isset($_REQUEST["q_id"])){
    $q_id= $_REQUEST["q_id"];
    $query="SELECT * FROM responce WHERE question_id=$q_id";
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    $query2= "SELECT question, ismcq FROM questions WHERE question_id= $q_id";
    $result= mysqli_query($connection, $query);
    $result2= mysqli_query($connection, $query2);
    $data2= mysqli_fetch_assoc($result2);
    $question =$data2["question"];
    // echo 
    $is_mcq=$data2["ismcq"];
    if($is_mcq==1){
        $qus_ans=explode("??",$question);
        echo $qus_ans[0];
        $options= explode("__",$qus_ans[1]);
        echo "<br>";
        $output= '<table id="ptable">
        <thead>
            <tr>
                <th>option a</th>
                <th>option b</th>
                <th>option c</th>
                <th>option d</th>
                </tr>
        </thead>
    ';
    $output.= " <tr>
    <th>'$options[0]'</th>
    <th>'$options[1]'</th>
    <th>'$options[2]'</th>
    <th>'$options[3]'</th>
    </tr>
    </table> <br><br>";
    echo $output;
    // echo "<br><br>";
    $output= '<table id="ptable">
        <thead>
            <tr>
                <th>respondent id</th>
                <th>responce</th>
                <th>responce date</th>
                </tr>
        </thead>
    ';
        while($data= mysqli_fetch_assoc($result)){
            $resp_id=$data['respondent_id'];
            $resp_link= "<a href= see_respondent_info.php?resp_id=$resp_id> $resp_id </a>";
            $output.='<tr>
            <th>'.$resp_link.'</th>
            <th>'.$data["answer"].'</th>
            <th>'.$data["respnceDate"].'</th>
             </tr>';
        }
        $output.="</table>";
        echo $output;
    }
    else{
        echo $question;
        $output= '<table id="ptable">
        <thead>
            <tr>
                <th>respondent id</th>
                <th>responce</th>
                <th>responce date</th>
                <th>mark nutral</th>
                <th>mark garbage</th>
                </tr>
        </thead>
    ';
    
        while($data= mysqli_fetch_assoc($result)){
            $resp_id=$data['respondent_id'];
            $resp= $data['survey_id'];
            $resp_link= "<a href= see_respondent_info.php?resp_id=$resp_id> $resp_id </a>";
            $output.='<tr>
                <th>'.$resp_link.'</th>
                <th>'.$data["answer"].'</th>
                <th>'.$data["respnceDate"].'</th>
                <th>'. "<a href= add_nutral.php?survey_id=$resp> mark as nutral </a>".'</th>
                <th>'."<a href= add_garbage.php?survey_id=$resp> mark as garbage </a>".'</th>
            </tr>';
            
        }
        $output.="</table>";
        echo $output;
    }


}
else{ header("Location: researcher_profile.php");}

?>
<!DOCTYPE html><html lang="en"><head><title> all responces</title></head><body></body></html>
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
                