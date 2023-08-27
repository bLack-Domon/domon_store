<?php
include '../config.php';
$page = 'PROFILE';

// CEK USER LOGIN
if (!isset($_COOKIE['login'])) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
    <title><?php echo $profile['nama_lengkap']; ?></title>
    <link rel="icon" href="../assets/icons/<?php echo $logo; ?>" type="image/svg">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/profile/user.css">
</head>

<body>
    <!-- BERI PENILAIAN -->
    <div class="box_bp_produk" id="box_bp_produk">
        <div class="bp_produk">
            <div class="box_close_bp" onclick="close_bp()">
                <i class="fas fa-times"></i>
            </div>
            <h1>Beri Penilaian Untuk Produk Ini</h1>
            <div class="box_star_bp">
                <i class="fas fa-star" id="star_c1"></i>
                <i class="fas fa-star" id="star_c2"></i>
                <i class="fas fa-star" id="star_c3"></i>
                <i class="fas fa-star" id="star_c4"></i>
                <i class="fas fa-star" id="star_c5"></i>
            </div>
            <input type="hidden" id="star_bp_inp">
            <div class="box_deskripsi_bp">
                <textarea class="input" id="deskripsi_bp_inp" rows="3" placeholder="Tambahkan Deskripsi..."></textarea>
            </div>
            <input type="hidden" id="id_inv_bp">
            <p class="bpld_red" id="bpld_red">Berikan penilaian</p>
            <div class="box_deskripsi_bp">
                <div class="button" onclick="kirim_penilaian_bp()">
                    <p id="t_bp_send">Kirimkan</p>
                    <img src="../assets/icons/loading-w.svg" id="load_bp_send">
                </div>
            </div>
        </div>
    </div>
    <!-- BERI PENILAIAN -->

    <!-- HEADER -->
    <?php include '../partials/header.php'; ?>
    <!-- HEADER -->

    <!-- CONTENT -->
    <div class="width">
        <div class="profile">
            <div class="user_info" id="user_info">
                <div class="info_user">
                    <img src="../assets/image/profile/<?php echo $profile['foto']; ?>" alt="">
                    <div class="box_data_user">
                        <h1><?php echo $profile['nama_lengkap']; ?></h1>
                        <p><?php echo $profile['email']; ?></p>
                    </div>
                </div>
                <div class="mo_order_menu">
                    <div class="box_mo_order_menu">
                        <div class="isi_mo_order_menu" id="c_mo_belum_bayar">
                            <img src="../assets/icons/belum-bayar.svg" alt="">
                            <p>Belum Bayar</p>
                        </div>
                        <div class="isi_mo_order_menu" id="c_mo_dikemas">
                            <img src="../assets/icons/dikemas.svg" alt="">
                            <p>Dikemas</p>
                        </div>
                        <div class="isi_mo_order_menu" id="c_mo_dikirim">
                            <img src="../assets/icons/dikirim.svg" alt="">
                            <p>Dikirim</p>
                        </div>
                        <div class="isi_mo_order_menu" id="c_mo_selesai">
                            <img src="../assets/icons/selesai.svg" alt="">
                            <p>Selesai</p>
                        </div>
                    </div>
                </div>
                <div class="menu_user_info">
                    <a href="edit">
                        <div class="isi_menu_user_info">
                            <p>Edit Profile</p>
                            <i class="ri-arrow-right-s-line"></i>
                        </div>
                    </a>
                    <a href="../help/bantuan.php">
                        <div class="isi_menu_user_info">
                            <p>Bantuan</p>
                            <i class="ri-arrow-right-s-line"></i>
                        </div>
                    </a>
                    <a href="../help/kebijakan-privasi.php">
                        <div class="isi_menu_user_info">
                            <p>Kebijakan Privasi</p>
                            <i class="ri-arrow-right-s-line"></i>
                        </div>
                    </a>
                    <a href="../help/tentang-kami.php">
                        <div class="isi_menu_user_info">
                            <p>Tentang Kami</p>
                            <i class="ri-arrow-right-s-line"></i>
                        </div>
                    </a>
                    <a href="../help/hubungi-kami.php">
                        <div class="isi_menu_user_info">
                            <p>Hubungi Kami</p>
                            <i class="ri-arrow-right-s-line"></i>
                        </div>
                    </a>
                    <a href="../system/logout.php">
                        <div class="isi_menu_user_info">
                            <p>Logout</p>
                            <i class="ri-arrow-right-s-line"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="order_menu" id="order_menu">
                <div class="box_select_order_menu">
                    <div class="box_header_order_menu_mobile">
                        <p>Pesanan Saya</p>
                        <i class="ri-close-line" id="close_order_menu"></i>
                    </div>
                    <div class="box_select_order_menu2">
                        <div class="select_order_menu">
                            <div class="isi_select_order_menu_active" id="belum_bayar">
                                <p>Belum Bayar</p>
                            </div>
                            <div class="isi_select_order_menu" id="dikemas">
                                <p>Dikemas</p>
                            </div>
                            <div class="isi_select_order_menu" id="dikirim">
                                <p>Dikirim</p>
                            </div>
                            <div class="isi_select_order_menu" id="selesai">
                                <p>Selesai</p>
                            </div>
                            <div class="isi_select_order_menu" id="dibatalkan">
                                <p>Dibatalkan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="res_order_menu">
                    <div class="box_loading_order_menu" id="loading_order_menu">
                        <center><img src="../assets/icons/loading-o.svg" class="loading_order_menu"></center>
                    </div>
                    <div id="res_order_menu"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="res"></div>
    <!-- CONTENT -->

    <!-- BOTTOM NAVIGATION -->
    <?php include '../partials/bottom-navigation.php'; ?>
    <!-- BOTTOM NAVIGATION -->

    <!-- FOOTER -->
    <?php include '../partials/footer.php'; ?>
    <!-- FOOTER -->

    <!-- JS -->
    <script src="../assets/js/profile/index.js"></script>
    <!-- JS -->
</body>

</html>