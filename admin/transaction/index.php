<?php
include '../../config.php';

$page_admin = 'transaksi';

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
    <title>Admin Transaksi</title>
    <link rel="icon" href="../../assets/icons/<?php echo $logo; ?>" type="image/svg">
    <link rel="stylesheet" href="../../assets/css/admin/transaction/index.css">
</head>

<body>
    <!-- VIEW DETAIL INVOICE -->
    <div class="back_vd_iv" id="back_vd_iv">
        <div class="vd_iv" id="vd_iv">
            <i class="fas fa-window-close close_vd_iv" onclick="close_detail_invoice()"></i>
            <div class="produk_vd_iv">
                <img id="img_produk_vd_iv" src="">
                <div class="rincian_produk_vd_iv">
                    <h1 id="judul_produk_vd_iv"></h1>
                    <p>Kategori <span id="kategori_vd_iv"></span></p>
                    <p>Kuantitas <span id="kuantitas_vd_iv"></span></p>
                </div>
            </div>
            <div class="rincian_vd_iv">
                <div class="isi_rincian_vd_iv">
                    <h3>No. Pesanan</h3>
                    <h4 id="id_pesanan_vd_iv"></h4>
                </div>
                <div class="isi_rincian_vd_iv">
                    <h3>Status Pesanan</h3>
                    <h4 id="status_pesanan_vd_iv"></h4>
                </div>
                <div class="isi_rincian_vd_iv">
                    <h3>Status Pembayaran</h3>
                    <h4 id="status_pembayaran_vd_iv"></h4>
                </div>
                <div class="isi_rincian_vd_iv">
                    <h3>Nama Pembeli</h3>
                    <h4 id="nama_pembeli_vd_iv"></h4>
                </div>
                <div class="isi_rincian_vd_iv">
                    <h3>Alamat Pembeli</h3>
                    <h4 id="alamat_pembeli_vd_iv"></h4>
                </div>
                <div class="isi_rincian_vd_iv">
                    <h3>Kurir Pengiriman</h3>
                    <h4 id="kurir_pengiriman_vd_iv"></h4>
                </div>
                <div class="isi_rincian_vd_iv">
                    <h3>Total Pembayaran</h3>
                    <h4 id="total_pembayaran_vd_iv"></h4>
                </div>
            </div>
            <div class="box_button_vd_id">
                <a href="" class="link" id="link_print_vd_iv">
                    <div class="button">
                        <p>Print Nota Pesanan</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- VIEW DETAIL INVOICE -->

    <!-- UPLOAD RESI -->
    <div class="back_up_ri" id="back_up_ri">
        <div class="up_ri">
            <h1>Tambahkan Resi Pengiriman</h1>
            <input type="hidden" id="idinvoice_pss">
            <input type="text" class="input" id="resi_pengiriman_v" placeholder="Resi Pengiriman">
            <div class="button" onclick="add_resi_pengiriman()">
                <p>Tambahkan</p>
            </div>
        </div>
    </div>
    <!-- UPLOAD RESI -->

    <div class="admin">
        <?php include '../partials/menu.php'; ?>
        <div class="content_admin">
            <h1 class="title_content_admin">Transaksi</h1>
            <div class="isi_content_admin">
                <!-- CONTENT -->
                <div class="list_transaksi_admin">
                    <div class="isi_list_transaksi_admin" id="belum_bayar">
                        <p>Belum Dibayar</p>
                    </div>
                    <div class="isi_list_transaksi_admin" id="sudah_bayar">
                        <p>Sudah Dibayar</p>
                    </div>
                    <div class="isi_list_transaksi_admin" id="dalam_perjalanan">
                        <p>Dikirim</p>
                    </div>
                    <div class="isi_list_transaksi_admin" id="selesai">
                        <p>Selesai</p>
                    </div>
                    <div class="isi_list_transaksi_admin" id="dibatalkan">
                        <p>Dibatalkan</p>
                    </div>
                </div>
                <div class="box_res_transaksi_admin">
                    <div class="loading_res_transaksi_admin" id="loading_res_transaksi_admin">
                        <center><img src="../../assets/icons/loading-o.svg"></center>
                    </div>
                    <div class="res_transaksi_admin" id="res_transaksi_admin">
                    </div>
                </div>
                <!-- CONTENT -->
            </div>
        </div>
    </div>
    <!-- JS -->
    <script src="../../assets/js/admin/transaction/index.js"></script>
    <!-- JS -->
</body>

</html>