<?php

session_start();
if(
        isset($_SESSION['r_id'])
    &&  !empty($_SESSION['r_id'])
){
    unset($_SESSION['r_id']);
    unset($_SESSION['type']);
    session_destroy();
    
    ?>
        <script>location.assign("researcher_login.php");</script>
    <?php 
    
}
else{
    ?>
        <script>location.assign("researcher_login.php");</script>
    <?php 
}

?>