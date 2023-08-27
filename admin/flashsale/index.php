<?php
include '../../config.php';

$page_admin = 'flashsale';

if (isset($_COOKIE['login_admin'])) {
    if ($akun_adm == 'false') {
        header("location: " . $url . "system/admin/logout");
    }
} else {
    header("location: " . $url . "admin/login/");
}

$select_fs = $server->query("SELECT * FROM `flashsale` WHERE `id_fs`='1' ");
$data_fs = mysqli_fetch_assoc($select_fs);
$wb_fs = $data_fs['waktu_berakhir'];

$select_produk_fs = $server->query("SELECT * FROM `iklan` WHERE `tipe_iklan`='flash sale' ORDER BY `iklan`.`id` DESC");
$jumlah_produk_fs = mysqli_num_rows($select_produk_fs);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Flash Sale</title>
    <link rel="icon" href="../../assets/icons/<?php echo $logo; ?>" type="image/svg">
    <link rel="stylesheet" href="../../assets/css/admin/flashsale/index.css">
</head>

<body>
    <!-- EDIT TIME FS -->
    <div class="box_edit_time_fs" id="box_edit_time_fs">
        <div class="edit_time_fs">
            <h1>Waktu Berakhir</h1>
            <h5>Format Bulan: <b>Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec</h5>
            </p>
            <h5>Contoh Format: <b>24 Jun 2021 14:05:30</b></h5>
            <p class="p_input" id="p_input_fs">Waktu Flash Sale</p>
            <input type="text" class="input" id="time_fs" value="<?php echo date("d M Y H:i:s", $wb_fs); ?>" placeholder="Waktu Flash Sale">
            <div class="button" id="bu_fs" onclick="simpan_et_fs()">
                <p id="t_bu_et_fs">Simpan</p>
                <img src="../../assets/icons/loading-w.svg" id="img_bu_et_fs" alt="">
            </div>
            <div class="button btl_fs" onclick="hide_et_fs()">
                <p>Batal</p>
            </div>
        </div>
    </div>
    <!-- EDIT TIME FS -->

    <!-- TAMBAH PRODUK FS -->
    <div class="box_edit_time_fs" id="box_tp_fs">
        <div class="edit_time_fs">
            <h1>Tambah Produk Flash Sale</h1>
            <p class="p_input" id="p_id_produk_new_fs">Pilih Produk</p>
            <select class="input" id="id_produk_new_fs">
                <option value="" selected disabled hidden>Pilih Produk</option>
                <?php
                $select_produk_non_fs = $server->query("SELECT * FROM `iklan` WHERE `tipe_iklan`='' ORDER BY `iklan`.`id` DESC");
                while ($data_produk_non_fs = mysqli_fetch_assoc($select_produk_non_fs)) {
                ?>
                    <option value="<?php echo $data_produk_non_fs['id']; ?>"><?php echo substr($data_produk_non_fs['judul'], 0, 45); ?></option>
                <?php
                }
                ?>
            </select>
            <p class="p_input" id="p_persen_new_fs" style="margin-top: 15px;">Persen Dari Harga</p>
            <input type="text" class="input" id="persen_new_fs" placeholder="Contoh: 20">

            <div class="button" id="bu_fs" onclick="simpan_tp_fs()">
                <p id="t_bu_tp_fs">Simpan</p>
                <img src="../../assets/icons/loading-w.svg" id="img_bu_tp_fs" alt="">
            </div>
            <div class="button btl_fs" onclick="hide_tp_fs()">
                <p>Batal</p>
            </div>
        </div>
    </div>
    <!-- TAMBAH PRODUK FS -->

    <!-- DELETE PRODUK FS -->
    <div class="back_popup_confirm" id="popup_hapus_produk">
        <div class="popup_confirm">
            <div class="head_popup_confirm">
                <i class="ri-delete-bin-line"></i>
                <p>Hapus Produk</p>
            </div>
            <h5>Apakah anda yakin ingin manghapus produk ini dari flash sale?</h5>
            <div class="box_button_popup_confirm">
                <div class="button_cancel_popup_confirm" onclick="batal_hapus_produk()">
                    <p>Batal</p>
                </div>
                <div class="button_confirm_popup_confirm" onclick="hapus_produk_ya()">
                    <p id="text_ha_hp">Hapus</p>
                    <img src="../../assets/icons/loading-w.svg" id="loading_ha_hp">
                </div>
            </div>
        </div>
        <input type="hidden" id="val_id_h_produk">
    </div>
    <!-- DELETE PRODUK FS -->

    <!-- EDIT PRODUK FS -->
    <div class="box_edit_time_fs" id="show_edit_pro_fs">
        <div class="edit_time_fs">
            <h1>Edit Diskon Flash Sale</h1>
            <h5 id="judul_e_fs"></h5>
            <p class="p_input" id="p_input_e_fs">Persen Dari Harga</p>
            <input type="text" class="input" id="persen_e_fs" placeholder="Contoh: 20">
            <div class="button" id="bu_fs" onclick="simpan_edp_fs()">
                <p id="t_bu_edp_fs">Simpan</p>
                <img src="../../assets/icons/loading-w.svg" id="img_bu_edp_fs" alt="">
            </div>
            <div class="button btl_fs" onclick="hide_edp_fs()">
                <p>Batal</p>
            </div>
            <input type="hidden" id="id_edit_pro_fs">
        </div>
    </div>
    <!-- EDIT PRODUK FS -->

    <div class="admin">
        <?php include '../partials/menu.php'; ?>
        <div class="content_admin">
            <h1 class="title_content_admin">Flash Sale</h1>
            <div class="isi_content_admin">
                <!-- CONTENT -->
                <div class="head_fs_adm">
                    <h1>Waktu Berakhir: <?php echo date("d M Y H:i:s", $wb_fs); ?></h1>
                    <h2 onclick="show_et_fs()">Ubah <i class="fas fa-pen"></i></h2>
                </div>
                <div class="add_kategori_adm" onclick="show_tambah_produk_fs()">
                    <p>Tambah Produk</p>
                    <i class="ri-add-box-line"></i>
                </div>
                <?php
                if ($jumlah_produk_fs) {
                ?>
                    <div class="produk_fs">
                        <?php
                        while ($data_produk_fs = mysqli_fetch_assoc($select_produk_fs)) {
                            $exp_gambar_lp = explode(',', $data_produk_fs['gambar']);
                            $j_gambar_lp = count($exp_gambar_lp);
                        ?>
                            <div class="isi_all_users_admin">
                                <div class="box_left_aua">
                                    <img src="../../assets/image/product/<?php echo $exp_gambar_lp[0]; ?>">
                                    <div class="isi_box_left_aua">
                                        <h5><?php echo $data_produk_fs['judul']; ?></h5>
                                    </div>
                                </div>
                                <div class="box_right_aua">
                                    <div class="isi_box_right_aua">
                                        <h3>Harga</h3>
                                        <p>Rp <?php echo number_format($data_produk_fs['harga'], 0, ".", "."); ?></p>
                                    </div>
                                    <div class="isi_box_right_aua">
                                        <h3>Diskon</h3>
                                        <p><?php echo $data_produk_fs['diskon']; ?>%</p>
                                    </div>
                                </div>
                                <div class="bu_edit_aua" onclick="showg_edit_pro_fs('<?php echo $data_produk_fs['id']; ?>', `<?php echo $data_produk_fs['judul']; ?>`, '<?php echo $data_produk_fs['diskon']; ?>')">
                                    <i class="ri-pencil-line"></i>
                                </div>
                                <div class="bu_delete_aua" onclick="show_hapus_pro_fs('<?php echo $data_produk_fs['id']; ?>')">
                                    <i class="ri-delete-bin-line"></i>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
                <!-- CONTENT -->
            </div>
        </div>
    </div>
    <div id="res"></div>

    <!-- JS -->
    <script src="../../assets/js/admin/flashsale/index.js"></script>
    <!-- JS -->
</body>

</html>