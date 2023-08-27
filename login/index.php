<?php
include '../config.php';
include '../assets/composer/google-api-client-php-7.4/config.php';

// CEK LOGIN GOOGLE
if (isset($_GET['code'])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if (!isset($token['error'])) {
        $google_client->setAccessToken($token['access_token']);
        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();
        // DATA LOGIN GOOGLE
        $email_google = $data['email'];
        $nama_depan_google = $data['given_name'];
        $nama_belakang_google = $data['family_name'];
        $nama_lengkap_google = "$nama_depan_google $nama_belakang_google";
        $time = date("Y-m-d H:i:s");
        $jenis_daftar = "Google";
        // CEK AKUN
        $akun_user = $server->query("SELECT * FROM `akun` WHERE `email`='$email_google'");
        $akun_user_data = mysqli_fetch_assoc($akun_user);
        // HASIL CEK AKUN
        if ($akun_user_data) {
            $idakun = $akun_user_data['id'] . "hcCTZvFLD7XIchiaMqEka0TLzGgdpsXB";
            $ciphering = "AES-128-CTR";
            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;
            $encryption_iv = '1234567891011121';
            $encryption_key = "ecommerce";
            $encryption = openssl_encrypt($idakun, $ciphering, $encryption_key, $options, $encryption_iv);
            $buat_cookie = setcookie("login", $encryption, time() + (86400 * 30), "/");
            if ($buat_cookie) {
                echo '<script>window.location.href="' . $url . '";</script>';
            }
        } else {
            $insert_akun = $server->query("INSERT INTO `akun`(`foto`, `nama_lengkap`, `email`, `waktu`, `tipe_daftar`) VALUES ('user.png', '$nama_lengkap_google', '$email_google', '$time', '$jenis_daftar')");
            if ($insert_akun) {
                $select_akun = $server->query("SELECT * FROM `akun` WHERE `email`='$email_google'");
                $select_akun_data = mysqli_fetch_assoc($select_akun);
                // ENSKRIPSI ID
                $idakun = $select_akun_data['id'] . "hcCTZvFLD7XIchiaMqEka0TLzGgdpsXB";
                $ciphering = "AES-128-CTR";
                $iv_length = openssl_cipher_iv_length($ciphering);
                $options = 0;
                $encryption_iv = '1234567891011121';
                $encryption_key = "ecommerce";
                $encryption = openssl_encrypt($idakun, $ciphering, $encryption_key, $options, $encryption_iv);
                $buat_cookie = setcookie("login", $encryption, time() + (86400 * 30), "/");
                if ($buat_cookie) {
                    echo '<script>window.location.href="' . $url . '";</script>';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
    <title>Login</title>
    <link rel="icon" href="../assets/icons/<?php echo $logo; ?>" type="image/svg">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/login-register/index.css">
</head>

<body>
    <!-- CONTENT -->
    <div class="log_reg">
        <center><a href="<?php echo $url; ?>"><img src="../assets/icons/<?php echo $logo; ?>" alt=""></a></center>
        <div class="box_log_reg">
            <h1>Masuk</h1>
            <h4>Belum punya akun? <a href="<?php echo $url; ?>register/">Daftar Sekarang</a></h4>
            <div class="log_reg_social">
                <a href="<?php echo $google_client->createAuthUrl(); ?>">
                    <div class="isi_log_reg_social">
                        <img src="../assets/icons/sosmed/google.svg" alt="">
                        <p>Masuk Dengan Google</p>
                    </div>
                </a>
            </div>
            <div class="line_log_reg"></div>
            <center>
                <p class="text_line_log_reg">Atau masuk dengan</p>
            </center>
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
                    <img src="../assets/icons/loading-w.svg" id="loading_masuk">
                </div>
            </div>
        </div>
    </div>
    <div class="res" id="res"></div>
    <!-- CONTENT -->

    <!-- JS -->
    <script src="../assets/js/login/index.js"></script>
    <!-- JS -->
</body>

</html>