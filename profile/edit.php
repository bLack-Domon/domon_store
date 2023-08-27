<?php
include '../config.php';

if (!isset($_COOKIE['login'])) {
    header('location: ../login/');
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
        <h1>Edit Profile</h1>
        <div class="box_img_pro">
            <div class="change_img_pro" onclick="click_file_img()">
                <i class="ri-pencil-fill"></i>
            </div>
            <img src="../assets/image/profile/<?php echo $profile['foto']; ?>" id="img_foto_pro">
            <input type="file" accept="image/*" class="cfile_img_pro" id="cfile_img_pro" onchange="change_image(event)">
        </div>
        <p class="err_foto_pro" id="err_foto_pro">Pastikan format foto jpg/png</p>
        <div class="box_input_pro">
            <div class="isi_box_input_pro">
                <p id="p_nama_lengkap">Nama Lengkap</p>
                <input type="text" class="input" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $profile['nama_lengkap']; ?>">
            </div>
            <div class="isi_box_input_pro">
                <p id="p_no_wa">Nomor WhatsApp</p>
                <input type="text" class="input" id="no_wa" placeholder="Nomor WhatsApp" value="<?php echo $profile['no_whatsapp']; ?>">
            </div>
        </div>
        <?php
        if ($profile['tipe_daftar'] == '') {
        ?>
            <a href="edit-password" class="tipe_daftar_biasa">Ubah Password</a>
        <?php
        } else {
        ?>
            <p class="tipe_daftar_social">Anda Mendaftar Dengan <?php echo $profile['tipe_daftar']; ?></p>
        <?php
        }
        ?>
        <div class="b_button_ep"></div>
        <div class="button" id="bu_e_pro" onclick="simpan_edit_profile()">
            <p>Simpan</p>
        </div>
        <div class="button" id="loading_e_pro" onclick="simpan_edit_profile()">
            <img src="../assets/icons/loading-w.svg" alt="">
        </div>
    </div>
    <div id="res"></div>
    <!-- CONTENT -->

    <!-- FOOTER -->
    <?php include '../partials/footer.php' ?>
    <!-- FOOTER -->

    <!-- JS -->
    <script src="../assets/js/profile/edit.js"></script>
    <!-- JS -->
</body>

</html>