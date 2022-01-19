<?php 

session_start();

include_once "db.php";
//error_reporting(E_ERROR | E_PARSE);

$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$surname = mysqli_real_escape_string($conn, $_POST['surname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($firstname) && !empty($surname) && !empty($email) && !empty($password)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            echo "$email adresi zaten kayıtlı";
        }else {
            if(isset($_FILES["image"])){
                $img_name = $_FILES["image"]["name"]; //uploaded image name
                $img_type = $_FILES["image"]["type"];
                $tmp_name = $_FILES["image"]["tmp_name"];
                $img_explode = explode(".", $img_name);
                $img_ext = end($img_explode);
                $extensions = ["png", "jpg", "jpeg"];
                if(in_array($img_ext, $extensions) === true){ //file extension check
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name, "profile_images/".$new_img_name)){
                        
                        $random_id = rand(time(), 10000000);
                        $status = "Active now";
                        //$hashedpwd = md5($password);
                        $sql2 = mysqli_query($conn, "INSERT INTO users(unique_id, first_name, last_name, email, password, img, status)
                                            VALUES({$random_id},'{$firstname}','{$surname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                        if($sql2){
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if(mysqli_num_rows($sql3) > 0){
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION["unique_id"] = $row["unique_id"];
                                echo "basarili";

                            }else{
                                echo "Bu mail adresi geçerli değil";
                            }
                        }else{
                            echo "Birşeyler ters gitti";
                        }
                    }
                }else{
                    echo "Lütfen doğru uzantılı bir dosya seçiniz(png, jpg, jpeg)";
                }
            }else {
                echo "Lütfen bir profil fotoğrafı seçiniz";
            }
        }
    }else{
        echo "$email eposta adresi geçersizdir";
    }
}else{
    echo "Lütfen bütün alanları doldurunuz";
}

?>