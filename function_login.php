<?php 

session_start();

include_once "db.php";
//error_reporting(E_ERROR | E_PARSE);

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


if (!empty($email) && !empty($password)) {
    $hashedpwd = md5($password);
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $status = "Çevrimiçi";
        $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
        if($sql2){
            $_SESSION["unique_id"] = $row["unique_id"];
            echo "basarili";
        }
    }else{
        echo "Eposta ya da parola hatalı";
    }
}else{
    echo "Lütfen bütün alanları doldurunuz";
}
