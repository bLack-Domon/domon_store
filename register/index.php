<?php
include '../config.php';
include '../assets/composer/google-api-client-php-7.4/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
    <title>Register</title>
    <link rel="icon" href="../assets/icons/<?php echo $logo; ?>" type="image/svg">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/login-register/index.css">
</head>

<body>
    <!-- CONTENT -->
    <div class="log_reg">
        <center><a href="<?php echo $url; ?>"><img src="../assets/icons/<?php echo $logo; ?>" alt=""></a></center>
        <div class="box_log_reg">
            <h1>Daftar</h1>
            <h4>Belum punya akun? <a href="<?php echo $url; ?>login/">Masuk Sekarang</a></h4>
            <div class="log_reg_social">
                <a href="<?php echo $google_client->createAuthUrl(); ?>">
                    <div class="isi_log_reg_social">
                        <img src="../assets/icons/sosmed/google.svg" alt="">
                        <p>Daftar Dengan Google</p>
                    </div>
                </a>
            </div>
            <div class="line_log_reg"></div>
            <center>
                <p class="text_line_log_reg">Atau Daftar dengan</p>
            </center>
            <div class="box_form_log_reg">
                <div class="form_log_reg">
                    <p id="p_nama_lengkap"></p>
                    <input type="text" placeholder="Nama Lengkap" class="input" id="nama_lengkap">
                </div>
                <div class="form_log_reg">
                    <p id="p_email"></p>
                    <input type="text" placeholder="Email" class="input" id="email">
                </div>
                <div class="form_log_reg">
                    <p id="p_no_whatsapp"></p>
                    <input type="text" placeholder="Nomor Whatsapp" class="input" id="no_whatsapp">
                </div>
                <div class="form_log_reg">
                    <p id="p_password"></p>
                    <input type="password" placeholder="Password" class="input" id="password">
                </div>
            </div>
            <div id="daftar_button">
                <div class="button" id="daftar">
                    <p>Daftar Sekarang</p>
                </div>
            </div>
            <div id="daftar_loading">
                <div class="button">
                    <img src="../assets/icons/loading-w.svg" id="loading_daftar">
                </div>
            </div>
        </div>
    </div>
    <div class="res" id="res"></div>
    <!-- CONTENT -->

    <!-- JS -->
    <script src="../assets/js/register/index.js"></script>
    <!-- JS -->
</body>

</html>