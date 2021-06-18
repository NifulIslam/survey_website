<?php
if( !isset($_REQUEST["t_a"]) ){
    header("Location: question_set_name.php"); 
}

?>


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>add question</title>
    </head>
    <body>
        <a href= "researcher_profile.php" > home </a>

        <form action="add_mcq.php" method="get">
        <input type = "submit" name="addMcq" value ="add mcq">
        <br>
        </form>
        <form action="add_cq.php" method="get">
        <input type = "submit" name="addCq" value ="add cq">
        </form>
    </body>
    </html>