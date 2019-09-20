<?php
    session_start();
    if(!isset($_SESSION['name'])){
        $url = "./login.php";
        header("Location:$url");         
    }
    
?>