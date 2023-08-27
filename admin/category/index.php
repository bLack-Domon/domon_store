<?php
include '../../config.php';

$page_admin = 'kategori';

if (isset($_COOKIE['login_admin'])) {
    if ($akun_adm == 'false') {
        header("location: " . $url . "system/admin/logout");
    }
} else {
    header("location: " . $url . "admin/login/");
}

$select_kategori_adm = $server->query("SELECT * FROM `kategori`");
$jumlah_kategori_adm = mysqli_num_rows($select_kategori_adm);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kategori</title>
    <link rel="icon" href="../../assets/icons/<?php echo $logo; ?>" type="image/svg">
    <link rel="stylesheet" href="../../assets/css/admin/category/index.css">
</head>

<body>
    <!-- TAMBAH KATEGORI FORM -->
    <div class="tambah_kategori_form" id="tambah_kategori_form">
        <div class="isi_tambah_kategori_form">
            <h1>Tambah Kategori</h1>
            <div class="box_form_tk">
                <div class="isi_box_form_tk">
                    <p id="p_icon_file">Icon</p>
                    <input type="file" class="input" id="icon_file">
                </div>
                <div class="isi_box_form_tk">
                    <p id="p_nama_kategori">Nama</p>
                    <input type="text" class="input" id="nama_kategori" placeholder="Nama Kategori">
                </div>
            </div>
            <div class="box_button_edit_akun">
                <div class="button_cancel_edit_akun" onclick="batal_add_kategori()">
                    <p>Batal</p>
                </div>
                <div class="button_confirm_edit_akun" onclick="simpan_add_kategori()">
                    <p id="text_tkat">Simpan</p>
                    <img src="../../assets/icons/loading-w.svg" id="loading_tkat">
                </div>
            </div>
        </div>
    </div>
    <!-- TAMBAH KATEGORI FORM -->

    <!-- HAPUS KATEGORI -->
    <div class="back_popup_confirm" id="confirm_hapus">
        <div class="popup_confirm">
            <div class="head_popup_confirm">
                <i class="ri-delete-bin-line"></i>
                <p>Hapus Kategori</p>
            </div>
            <h5>Kategori yang sudah di hapus tidak dapat dipulihkan kembali, produk yang kategori nya sudah di hapus tidak akan di tampilkan, apakah anda yakin ingin manghapus kategori ini?</h5>
            <div class="box_button_popup_confirm">
                <div class="button_cancel_popup_confirm" id="hide_confirm_hapus" onclick="batal_hapus_kategori()">
                    <p>Batal</p>
                </div>
                <div class="button_confirm_popup_confirm" onclick="hapus_kategori_ya()">
                    <p id="text_ha_kat">Hapus</p>
                    <img src="../../assets/icons/loading-w.svg" id="loading_ha_kat">
                </div>
            </div>
        </div>
        <input type="hidden" id="val_id_kategori">
    </div>
    <!-- HAPUS KATEGORI -->

    <!-- EDIT KATEGORI FORM -->
    <div class="tambah_kategori_form" id="edit_kategori_form">
        <div class="isi_tambah_kategori_form">
            <h1>Edit Kategori</h1>
            <div class="box_form_tk">
                <div class="isi_box_form_tk">
                    <p id="p_icon_now_file_edit">Icon Sekarang</p>
                    <img src="" class="img_edit_kategori" id="img_edit_kategori">
                </div>
                <div class="isi_box_form_tk">
                    <p id="p_icon_file_edit">Ubah Icon</p>
                    <input type="file" class="input" id="icon_file_edit">
                </div>
                <div class="isi_box_form_tk">
                    <p id="p_nama_kategori_edit">Ubah Nama</p>
                    <input type="text" class="input" id="nama_kategori_edit" placeholder="Nama Kategori">
                </div>
            </div>
            <div class="box_button_edit_akun">
                <div class="button_cancel_edit_akun" onclick="batal_edit_kategori()">
                    <p>Batal</p>
                </div>
                <div class="button_confirm_edit_akun" onclick="simpan_edit_kategori()">
                    <p id="text_ekat">Simpan</p>
                    <img src="../../assets/icons/loading-w.svg" id="loading_ekat">
                </div>
            </div>
        </div>
        <input type="hidden" id="val_id_kat_hapus">
    </div>
    <!-- EDIT KATEGORI FORM -->

    <div class="admin">
        <?php include '../partials/menu.php'; ?>
        <div class="content_admin">
            <h1 class="title_content_admin">Kategori</h1>
            <div class="isi_content_admin">
                <!-- CONTENT -->
                <div class="jumlah_users_admin">
                    <h1>Jumlah Kategori</h1>
                    <h1><?php echo $jumlah_kategori_adm; ?> Kategori</h1>
                </div>
                <div class="add_kategori_adm" onclick="show_add_kategori()">
                    <p>Tambah Kategori</p>
                    <i class="ri-play-list-add-fill"></i>
                </div>
                <div class="all_users_admin">
                    <?php
                    while ($data_kategori_adm = mysqli_fetch_assoc($select_kategori_adm)) {
                        $id_kategori_adm = $data_kategori_adm['id'];
                        $select_produk_kat = $server->query("SELECT * FROM `iklan` WHERE `id_kategori`='$id_kategori_adm'");
                        $jumlah_produk_kat = mysqli_num_rows($select_produk_kat);
                    ?>
                        <div class="isi_all_users_admin">
                            <div class="box_left_aua">
                                <img src="../../assets/icons/category/<?php echo $data_kategori_adm['icon']; ?>">
                                <div class="isi_box_left_aua">
                                    <h5><?php echo $data_kategori_adm['nama']; ?></h5>
                                </div>
                            </div>
                            <div class="box_right_aua">
                                <div class="isi_box_right_aua">
                                    <h3>Jumlah Produk</h3>
                                    <p><?php echo $jumlah_produk_kat; ?></p>
                                </div>
                            </div>
                            <div class="bu_edit_aua" onclick="show_edit_kategori('<?php echo $data_kategori_adm['id']; ?>', '<?php echo $data_kategori_adm['nama']; ?>', '../../assets/icons/category/<?php echo $data_kategori_adm['icon']; ?>')">
                                <i class="ri-pencil-line"></i>
                            </div>
                            <div class="bu_delete_aua" onclick="show_confirm_hapus('<?php echo $data_kategori_adm['id']; ?>')">
                                <i class="ri-delete-bin-line"></i>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- CONTENT -->
            </div>
        </div>
    </div>
    <div id="res"></div>

    <!-- JS -->
    <script src="../../assets/js/admin/category/index.js"></script>
    <!-- JS -->
</body>

</html>