<?php
session_start();

// GLOBAL URL
//Masukkan url domain utama dengan http / https
$url = "http://localhost/toko/";

// CONNECT SERVER
$server = new mysqli(
    "localhost", //host db
    "root", //user db
    "", //pass user
    "toko" //nama db
);

// CEK LOGIN USER
if (isset($_COOKIE['login'])) {
    $key_login = $_COOKIE['login'];
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $decryption_iv = '1234567891011121';
    $decryption_key = "ecommerce";
    $decryption = openssl_decrypt($key_login, $ciphering, $decryption_key, $options, $decryption_iv);

    $iduser_key_login = explode("hcCTZvFLD7XIchiaMqEka0TLzGgdpsXB", $decryption);
    $id_user_login = $iduser_key_login[0];

    $select_profile = $server->query("SELECT * FROM `akun` WHERE `id`='$id_user_login' ");
    $profile = mysqli_fetch_assoc($select_profile);
    $iduser = $profile['id'];

    // COUNT CART
    $count_cart_header = $server->query("SELECT * FROM `keranjang` WHERE `id_user`='$iduser' ");
    $cek_cart_header = mysqli_num_rows($count_cart_header);

    // COUNT NOTIFICATION
    $count_notif_header = $server->query("SELECT * FROM `notification` WHERE `id_user`='$iduser' AND `status_notif`='' ");
    $cek_notif_header = mysqli_num_rows($count_notif_header);
}

// CEK LOGIN ADMIN
if (isset($_COOKIE['login_admin'])) {
    $key_login_adm = $_COOKIE['login_admin'];
    $ciphering_adm = "AES-128-CTR";
    $iv_length_adm = openssl_cipher_iv_length($ciphering_adm);
    $options_adm = 0;
    $decryption_iv_adm = '1234567891011121';
    $decryption_key_adm = "admin_ecommerce";
    $decryption_adm = openssl_decrypt($key_login_adm, $ciphering_adm, $decryption_key_adm, $options_adm, $decryption_iv_adm);

    $iduser_key_login_adm = explode("hcCTZvFLD7XIchiaMqEka0TLzGgdpsXB", $decryption_adm);
    $id_user_login_adm = $iduser_key_login_adm[0];

    $select_profile_adm = $server->query("SELECT * FROM `akun` WHERE `id`='$id_user_login_adm' ");
    $profile_adm = mysqli_fetch_assoc($select_profile_adm);
    if ($profile_adm['tipe_akun'] == 'Admin') {
        $akun_adm = 'true';
    } else {
        $akun_adm = 'false';
    }
}

// HEADER SETTING
$setting_header = $server->query("SELECT * FROM `setting_header` WHERE `id_hs`='1'");
$data_setting_header = mysqli_fetch_assoc($setting_header);
$logo = $data_setting_header['logo'];
$title_name = $data_setting_header['title_name'];
$placeholder_search = $data_setting_header['placeholder_search'];

// API KEY SETTING
$setting_apikey = $server->query("SELECT * FROM `setting_apikey` WHERE `id_apikey`='1'");
$data_setting_apikey = mysqli_fetch_assoc($setting_apikey);
$google_client_id = $data_setting_apikey['google_client_id'];
$google_client_secret = $data_setting_apikey['google_client_secret'];
$midtrans_client_key = $data_setting_apikey['midtrans_client_key'];
$midtrans_server_key = $data_setting_apikey['midtrans_server_key'];
$rajaongkir_key = $data_setting_apikey['rajaongkir_key'];

// LOKASI TOKO
$lokasi_toko = $server->query("SELECT * FROM `setting_lokasi` WHERE `id`='1'");
$data_lokasi_toko = mysqli_fetch_assoc($lokasi_toko);
$provinsi_toko = $data_lokasi_toko['provinsi'];
$provinsi_id_toko = $data_lokasi_toko['provinsi_id'];
$kota_toko = $data_lokasi_toko['kota'];
$kota_id_toko = $data_lokasi_toko['kota_id'];

// TIPE PEMBAYARAN
$tipe_pembayaran = $server->query("SELECT * FROM `setting_pembayaran` WHERE `status`='active'");
$data_tipe_pembayaran = mysqli_fetch_array($tipe_pembayaran);
$nama_tipe_pembayaran = $data_tipe_pembayaran['tipe'];