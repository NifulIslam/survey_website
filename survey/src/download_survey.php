<?php
session_start();
if(isset($_SESSION["r_id"]) && $_SESSION["type"] == "researcher" && isset($_REQUEST["q_s"])){
    $connection = mysqli_connect("localhost", "root", "", "ask_me_db");
    $q_s_id= ($_REQUEST["q_s"]);
    $query= "SELECT qus.ismcq AS is_mcq,qus.question AS question, rsp.respondent_id AS repondent_id,rsp.answer AS responce, rsp.respnceDate AS responce_time FROM responce AS rsp JOIN questions AS qus ON rsp.question_id= qus.question_id WHERE qus.q_s_id= $q_s_id ORDER BY qus.ismcq ASC,qus.question_id ASC";
    $result= mysqli_query($connection, $query);
    $output= '<table bordered="1">
            <tr>
                <th>is mcq</th>
                <th>question</th>
                <th>option a</th>
                <th>option b</th>
                <th>option c</th>
                <th>option d</th>
                <th>repondent id</th>
                <th>responce</th>
                <th>responce time</th>
                </tr>
        
    ';
    while($data= mysqli_fetch_assoc($result)){
       
        $output.='<tr>
            <th>'.$data["is_mcq"].'</th>';
            if($data["is_mcq"]==1){
                $question= explode("??",$data["question"]);
                $options=explode("__",$question[1]);
                $output.='<th>'.$question[0].'</th>
                <th>'.$options[0].'</th>
                <th>'.$options[1].'</th>
                <th>'.$options[2].'</th>
                <th>'.$options[3].'</th>';
                
            }
            else{
                $output.='<th>'.$data["question"].'</th>
                <th>'.''.'</th>
                <th>'.''.'</th>
                <th>'.''.'</th>
                <th>'.''.'</th>';
                
            }

            $output.='<th>'.$data["repondent_id"].'</th>
            <th>'.$data["responce"].'</th>
            <th>'.$data["responce_time"].'</th>
            </tr>';
        
    }
    $output.="</table>";
    header('Content-Type: application/xlsx');
    $name =$q_s_id."responce";
    header("Content-Disposition: attachment; filename=$name.xls");
    echo $output;

}


else{ header("Location: researcher_profile.php");}


?>




