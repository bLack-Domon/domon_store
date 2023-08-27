<?php
include '../../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
    <title>Login</title>
    <link rel="icon" href="../../assets/icons/<?php echo $logo; ?>" type="image/svg">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/login-register/index.css">
</head>

<body>
    <!-- CONTENT -->
    <div class="log_reg">
        <center><a href="<?php echo $url; ?>"><img src="../../assets/icons/<?php echo $logo; ?>" alt=""></a></center>
        <div class="box_log_reg">
            <h1>Masuk Admin</h1>
            <div class="box_form_log_reg">
                <div class="form_log_reg">
                    <p id="p_email"></p>
                    <input type="text" placeholder="Email" class="input" id="email">
                </div>
                <div class="form_log_reg">
                    <p id="p_password"></p>
                    <input type="password" placeholder="Password" class="input" id="password">
                </div>
            </div>
            <div id="masuk_button">
                <div class="button" id="masuk">
                    <p>Masuk Sekarang</p>
                </div>
            </div>
            <div id="masuk_loading">
                <div class="button">
                    <img src="../../assets/icons/loading-w.svg" id="loading_masuk">
                </div>
            </div>
        </div>
    </div>
    <div class="res" id="res"></div>
    <!-- CONTENT -->

    <!-- JS -->
    <script src="../../assets/js/admin/login/index.js"></script>
    <!-- JS -->
</body>

</html>