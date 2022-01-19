<?php

session_start();
if(isset($_SESSION["unique_id"])){
    include_once "db.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET["logout_id"]);
    if(isset($logout_id)){
        $status = "Çevrimdışı";
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");

        if($sql){
            session_destroy();
            session_unset();
            header("location: login.php");
        }else{
            header("location: main.php");
        }
    }
}else{
    header("location: login.php");
}


?>