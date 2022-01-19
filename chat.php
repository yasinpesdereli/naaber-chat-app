<?php

session_start();
if (!isset($_SESSION["unique_id"])) {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php
                include_once "db.php";
                $user_id = mysqli_real_escape_string($conn, $_GET["user_id"]);
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }

                ?>
                <a href="main.php" class="back-icon"><i class="fas fa-arrow-alt-circle-left"></i> </i></a>
                <img src="profile_images/<?php echo $row["img"] ?>" alt="">
                <div class="details">
                    <span><?php echo $row["first_name"] . " " . $row["last_name"] ?></span>
                    <p><?php if ($row["status"] = "Active Now") {
                            echo "Çevrimiçi";
                        } else {
                            echo "Çevrimdışı";
                        }
                        ?></p>
                </div>
            </header>
            <div class="chat-box">
              
            </div>
            <form action="#" class="typing-area">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION["unique_id"]; ?>" hidden> <!--- gönderici userid --->
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden> <!--- alıcı userid --->
                <input type="text" name="message" class="input-field" placeholder="Mesajınızı yazabilirsiniz">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>

        </section>
    </div>
</body>
<script src="js/chat.js"></script>

</html>