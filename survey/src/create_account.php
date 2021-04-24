<?php
$connection = mysqli_connect("localhost", "root", "", "ask_me_db");

    if(isset($_REQUEST["createBtn"])){
        $name= $_REQUEST["researcher_name"];
        $pass =$_REQUEST["researcher_pass"];
        $id= $_REQUEST["ida"];
        //check if the id is int
        if($name!="" && $id != "" && strlen($name)<256  && strlen($pass)>6 ) {
            $query= "INSERT INTO researcher (researcher_id ,name, PASSWORD_) VALUES ('$id','$name' ,'$pass')";
            $result= mysqli_query($connection, $query);
           if(!$result){
               header ("Location: create_account.php?unsuccess='y'");
           }
           else{
                echo '           <script>
                alert("account created");
                </script>';

           
           // send back to another page
           //header("Location: create_account.html");
           }

        }
        else{
            echo '           <script>
            alert("invalid data")
         </script>';
        }
        
        
    }
    // un successful result from server
    if(isset($_REQUEST['unsuccess'])){
        echo '           <script>
        alert("invalid id. already taken or not and integer")
     </script>';
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

