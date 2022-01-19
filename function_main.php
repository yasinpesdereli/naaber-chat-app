<?php

session_start();
include_once "db.php";
$outgoing_id = $_SESSION['unique_id'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id={$outgoing_id}");
$output = "";
if (mysqli_num_rows($sql) == 1) {
    $output .= "Kimse çevrimiçi değil :(";
    
} elseif (mysqli_num_rows($sql) > 1) {
    include "data.php";
}
echo $output;


?>