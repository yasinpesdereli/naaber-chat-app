<?php
session_start();
include_once "db.php";
if(!isset($_SESSION["unique_id"])){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naabeer Chat</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php 
                
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION["unique_id"]}");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
                
                ?>
                <div class="content">
                    <img src="profile_images/<?php echo $row["img"] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row["first_name"] . " " . $row["last_name"]?></span>
                        <p><?php if($row["status"] = "Çevrimiçi"){
                            echo "Çevrimiçi";
                        }else{
                            echo "Çevrimdışı";
                        }
                         ?></p>
                    </div>
                </div>
                <a href="logout.php?logout_id=<?php echo $row["unique_id"] ?>" class="logout">Çıkış</a>
            </header>
            <div class="search">
                <span class="text">Kullanıcılar ile sohbete başlayın</span>
                <input type="text" placeholder="Kullanıcı arayın">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                
            </div>
        </section>
    </div>
    <script src="js/searchbarbehaviour.js"></script>
    <script src="js/users.js"></script>
</body>
</html>