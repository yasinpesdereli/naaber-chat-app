<?php 


session_start();
if(isset($_SESSION["unique_id"])){
    header("location: main.php");
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
        <section class="form signup">
            <header>NAABEER CHAT</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>Adınız</label>
                        <input type="text" name="firstname" placeholder="Adınız" required>
                    </div>
                    <div class="field input">
                        <label>Soyadınız</label>
                        <input type="text" name="surname" placeholder="Soyadınız" required>
                    </div>
                    <div class="field input">
                        <label>Eposta Adresiniz</label>
                        <input type="text" name="email" placeholder="Eposta Adresiniz" required>
                    </div>
                    <div class="field input">
                        <label>Parola</label>
                        <input type="password" name="password" placeholder="Parola" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label>Fotoğraf</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Sohbete Başla!!!">
                    </div>
             </div>
            </form>
            <div class="link">Kayıtlı Mısınız? <a href="">Giriş Yap</a></div>
        </section>
    </div>
    <script src="js/passwordsh.js"></script>
    <script src="js/register.js"></script>
</body>
</html>