<?php
session_start();
if(isset($_SESSION["r_id"]) && $_SESSION["type"] == "researcher"){
}
else{ header("Location: researcher_profile.php");}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>survey history</title>
</head>
<body>
    hi
</body>
</html>