<?php
include '../../config.php';

$page_admin = 'promo';

if (isset($_COOKIE['login_admin'])) {
    if ($akun_adm == 'false') {
        header("location: " . $url . "system/admin/logout");
    }
} else {
    header("location: " . $url . "admin/login/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Promo</title>
    <link rel="icon" href="../../assets/icons/<?php echo $logo; ?>" type="image/svg">
    <link rel="stylesheet" href="../../assets/css/admin/promotion/index.css">
</head>

<body>
    <!-- POPUP CONFIRM -->
    <div class="back_popup_confirm" id="confirm_hapus">
        <div class="popup_confirm">
            <div class="head_popup_confirm">
                <i class="ri-delete-bin-line"></i>
                <p>Hapus banner promo</p>
            </div>
            <h5>Banner promo yang sudah di hapus tidak dapat dipulihkan kembali, apakah anda yakin ingin manghapus banner ini?</h5>
            <div class="box_button_popup_confirm">
                <div class="button_cancel_popup_confirm" id="hide_confirm_hapus" onclick="batal_hapus_banner()">
                    <p>Batal</p>
                </div>
                <div class="button_confirm_popup_confirm" onclick="hapus_banner()">
                    <p id="text_ha">Hapus</p>
                    <img src="../../assets/icons/loading-w.svg" id="loading_ha">
                </div>
            </div>
        </div>
        <input type="hidden" id="val_id_banner">
    </div>
    <!-- POPUP CONFIRM -->

    <div class="admin">
        <?php include '../partials/menu.php'; ?>
        <div class="content_admin">
            <h1 class="title_content_admin">Banner Promo</h1>
            <div class="isi_content_admin">
                <!-- CONTENT -->
                <div class="banner_promo">
                    <div class="add_banner_promo" onclick="add_banner_promo()">
                        <center>
                            <div id="box_add_banner_promo">
                                <i class="ri-image-add-line"></i>
                                <p>Tambah Banner Promo</p>
                                <p>1146 X 255</p>
                            </div>
                            <div id="loading_add_banner_promo">
                                <img src="../../assets/icons/loading-o.svg" class="loading_add_banner_promo">
                                <p class="p_loading_add_banner_promo">Sedang Mengupload...</p>
                            </div>
                        </center>
                    </div>
                    <?php
                    $banner_promo = $server->query("SELECT * FROM `banner_promo` ORDER BY `banner_promo`.`idbanner` DESC");
                    while ($banner_promo_data = mysqli_fetch_assoc($banner_promo)) {
                    ?>
                        <div class="isi_banner_promo">
                            <img src="../../assets/image/banner/<?php echo $banner_promo_data['image']; ?>" class="img_banner_promo">
                            <div class="menu_isi_banner_promo">
                                <div class="<?php if ($banner_promo_data['status'] == '') {
                                                echo 'box_status_banner_promo';
                                            } else {
                                                echo 'box_status_banner_promo_nonactive';
                                            } ?>" id="box_status_banner_promo<?php echo $banner_promo_data['idbanner']; ?>">
                                    <i class="ri-checkbox-fill" <?php if ($banner_promo_data['status'] == '') { ?> onclick="nonaktif_banner('<?php echo $banner_promo_data['idbanner']; ?>')" <?php } else { ?> onclick="aktif_banner('<?php echo $banner_promo_data['idbanner']; ?>')" <?php } ?>></i>
                                    <p id="ns_banner_promo<?php echo $banner_promo_data['idbanner']; ?>"><?php if ($banner_promo_data['status'] == '') {
                                                                                                                echo 'Aktif';
                                                                                                            } else {
                                                                                                                echo 'Tidak Aktif';
                                                                                                            } ?></p>
                                </div>
                                <i class="ri-image-edit-line icon_mib" onclick="click_edit_banner('<?php echo $banner_promo_data['idbanner']; ?>')"></i>
                                <i class="ri-delete-bin-line icon_mib" onclick="show_hapus_banner('<?php echo $banner_promo_data['idbanner']; ?>')"></i>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <input type="file" accept="image/*" id="edit_banner_click" onchange="edit_banner_now()">
                    <input type="file" accept="image/*" id="pilih_banner" onchange="add_new_banner()">
                    <input type="hidden" id="id_edit_banner">
                </div>
                <!-- CONTENT -->
            </div>
        </div>
    </div>
    <div id="res"></div>

    <!-- JS -->
    <script src="../../assets/js/admin/promotion/index.js"></script>
    <!-- JS -->
</body>

</html>