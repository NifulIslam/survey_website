<?php
$connection = mysqli_connect("localhost", "root", "", "ask_me_db");

    if(isset($_REQUEST["createBtn"])){
        $name= $_REQUEST["researcher_name"];
        $pass =$_REQUEST["researcher_pass"];
        $id= (int) $_REQUEST["ida"];
        if($name!="" && $id != 0 && strlen($name)<256  && strlen($pass)>6 ) {
            $hashPass= password_hash($pass, PASSWORD_DEFAULT);
            $query= "INSERT INTO researcher (researcher_id ,name, PASSWORD_) VALUES ('$id','$name' ,'$hashPass')";
            $result= mysqli_query($connection, $query);

            // getting the real id
            


           if(!$result){
               header ("Location: create_account.php?unsuccess='y'");
           }
           else{echo '<script>alert("account created. please remember your id");</script>';
                session_start();
                $_SESSION['r_id'] = $id;
                $_SESSION["type"]= "researcher";
                header("Location: researcher_profile.php");
           }

        }
        else{
            echo '<script>alert("invalid data");</script>';
        }
        
        
    }
    if(isset($_REQUEST['unsuccess'])){
        echo '<script>alert("id already taken");</script>';
    }
  


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account</title>
</head>
<body>

<form action ="create_account.php" method ="post">
    <input type= "text" placeholder ="id" name = "ida">
    <input type = "text"  placeholder ="name"  name = "researcher_name">
    <input type= "password" placeholder = "password" name ="researcher_pass">
    <input type = "submit" placeholder ="create" name="createBtn">
</form>
    

</body>
</html>

