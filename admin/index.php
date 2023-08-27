<?php
include '../config.php';

$page_admin = 'dashboard';

if (isset($_COOKIE['login_admin'])) {
    if ($akun_adm == 'false') {
        header("location: " . $url . "system/admin/logout");
    }
} else {
    header("location: " . $url . "admin/login/");
}

$time_today = date("Y-m-d");

// JUMLAH USER
$sj_user_adm = $server->query("SELECT * FROM `akun`");
$jumlah_user_adm = mysqli_num_rows($sj_user_adm);

// JUMLAH USER HARI INI
$sj_user_today_adm = $server->query("SELECT * FROM `akun` WHERE `waktu` LIKE '$time_today%' ORDER BY `akun`.`id` DESC");
$jumlah_user_today_adm = mysqli_num_rows($sj_user_today_adm);

// JUMLAH TRANSAKSI
$sj_transaksi_adm = $server->query("SELECT * FROM `invoice` WHERE `transaction`='settlement'");
$jumlah_transaksi_adm = mysqli_num_rows($sj_transaksi_adm);

// JUMLAH TRANSAKSI HARI INI
$sj_transaksi_today_adm = $server->query("SELECT * FROM `akun`, `iklan`, `invoice` WHERE invoice.id_iklan=iklan.id AND invoice.id_user=akun.id AND `transaction`='settlement' AND `waktu_transaksi`LIKE'$time_today%' ORDER BY `invoice`.`idinvoice` DESC");
$jumlah_transaksi_today_adm = mysqli_num_rows($sj_transaksi_today_adm);

// JUMLAH TRANSAKSI
$sj_produk_adm = $server->query("SELECT * FROM `iklan`");
$jumlah_produk_adm = mysqli_num_rows($sj_produk_adm);

// JUMLAH KATEGORI
$sj_kategori_adm = $server->query("SELECT * FROM `kategori`");
$jumlah_kategori_adm = mysqli_num_rows($sj_kategori_adm);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="icon" href="../assets/icons/<?php echo $logo; ?>" type="image/svg">
    <link rel="stylesheet" href="../assets/css/admin/index.css">
</head>

<body>
    <div class="admin">
        <?php include './partials/menu.php'; ?>
        <div class="content_admin">
            <h1 class="title_content_admin">Dashboard</h1>
            <div class="isi_content_admin">
                <!-- CONTENT -->
                <div class="menu_jumlah_adm">
                    <div class="isi_menu_jumlah_adm">
                        <i class="ri-user-3-fill"></i>
                        <div class="box_text_menu_jumlah_adm">
                            <p>Jumlah User</p>
                            <h1><?php echo number_format($jumlah_user_adm, 0, ".", "."); ?></h1>
                        </div>
                    </div>
                    <div class="isi_menu_jumlah_adm">
                        <i class="ri-shopping-bag-fill"></i>
                        <div class="box_text_menu_jumlah_adm">
                            <p>Jumlah Transaksi</p>
                            <h1><?php echo number_format($jumlah_transaksi_adm, 0, ".", "."); ?></h1>
                        </div>
                    </div>
                    <div class="isi_menu_jumlah_adm">
                        <i class="ri-archive-fill"></i>
                        <div class="box_text_menu_jumlah_adm">
                            <p>Jumlah Produk</p>
                            <h1><?php echo number_format($jumlah_produk_adm, 0, ".", "."); ?></h1>
                        </div>
                    </div>
                    <div class="isi_menu_jumlah_adm">
                        <i class="ri-file-list-2-fill"></i>
                        <div class="box_text_menu_jumlah_adm">
                            <p>Jumlah Kategori</p>
                            <h1><?php echo number_format($jumlah_kategori_adm, 0, ".", "."); ?></h1>
                        </div>
                    </div>
                </div>

                <div class="jumlah_today">
                    <div class="isi_jumlah_today">
                        <div class="head_isi_jumlah_today">
                            <h5>User Baru Hari Ini</h5>
                            <h5><?php echo number_format($jumlah_user_today_adm, 0, ".", "."); ?></h5>
                        </div>
                        <div class="content_jumlah_today">
                            <?php
                            while ($data_user_today = mysqli_fetch_assoc($sj_user_today_adm)) {
                                $exp_time_user_today = explode($time_today, $data_user_today['waktu']);
                            ?>
                                <div class="isi_content_jumlah_today">
                                    <img src="../assets/image/profile/<?php echo $data_user_today['foto']; ?>">
                                    <div class="text_isi_content_jumlah_today">
                                        <h3><?php echo $data_user_today['nama_lengkap']; ?></h3>
                                        <p><?php echo $data_user_today['email']; ?></p>
                                    </div>
                                    <p class="jam_icjt"><?php echo $exp_time_user_today[1]; ?></p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="isi_jumlah_today">
                        <div class="head_isi_jumlah_today">
                            <h5>Transaksi Baru Hari Ini</h5>
                            <h5><?php echo number_format($jumlah_transaksi_today_adm, 0, ".", "."); ?></h5>
                        </div>
                        <div class="content_jumlah_today">
                            <?php
                            while ($data_transaksi_today = mysqli_fetch_assoc($sj_transaksi_today_adm)) {
                                $exp_gambar_tt = explode(',' , $data_transaksi_today['gambar']);
                            ?>
                                <div class="isi_content_jumlah_today">
                                    <img src="../assets/image/product/<?php echo $exp_gambar_tt[0]; ?>">
                                    <div class="text_isi_content_jumlah_today">
                                        <h3><?php echo $data_transaksi_today['judul']; ?></h3>
                                        <p>Pembeli <?php echo $data_transaksi_today['nama_lengkap']; ?></p>
                                    </div>
                                    <p class="jam_icjt"><?php echo $data_transaksi_today['jumlah']; ?></p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- CONTENT -->
            </div>
        </div>
    </div>
</body>

</html>