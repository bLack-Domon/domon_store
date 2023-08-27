<?php
include '../config.php';

if (!isset($_COOKIE['login'])) {
    header('location: ../login/');
} elseif (!$profile['tipe_daftar'] == '') {
    header('location: edit');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="icon" href="../assets/icons/<?php echo $logo; ?>" type="image/svg">
    <link rel="stylesheet" href="../assets/css/profile/edit.css">
</head>

<body>
    <!-- HEADER -->
    <?php include '../partials/header.php' ?>
    <!-- HEADER -->

    <!-- CONTENT -->
    <div class="edit_profile">
        <div id="edit_password">
            <h1>Edit Password</h1>
            <div class="box_input_pro">
                <div class="isi_box_input_pro">
                    <p id="p_password_lama">Password Lama</p>
                    <input type="password" class="input" id="password_lama" placeholder="Masukan Password Lama">
                </div>
                <div class="isi_box_input_pro">
                    <p id="p_password_baru">Password Baru</p>
                    <input type="password" class="input" id="password_baru" placeholder="Masukan Password Baru">
                </div>
            </div>
            <div class="button" id="bu_e_pro" onclick="simpan_edit_password()">
                <p>Simpan</p>
            </div>
            <div class="button" id="loading_e_pro">
                <img src="../assets/icons/loading-w.svg" alt="">
            </div>
        </div>
        <div class="edit_password_berhasil" id="edit_password_berhasil">
            <i class="ri-shield-check-fill"></i>
            <h1>Berhasil Mengubah Password</h1>
            <div class="button" onclick="kembali_ke_edit()">
                <p>Kembali</p>
            </div>
        </div>
    </div>
    <div id="res"></div>
    <!-- CONTENT -->

    <!-- FOOTER -->
    <?php include '../partials/footer.php' ?>
    <!-- FOOTER -->

    <!-- JS -->
    <script src="../assets/js/profile/edit-password.js"></script>
    <!-- JS -->
</body>

</html>