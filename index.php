<?php
include './config.php';
$page = 'HOME';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
    <title>bLack Domon Store</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" />
    <link rel="icon" href="./assets/icons/<?php echo $logo; ?>" type="image/svg">
    <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body>
    <!-- HEADER -->
    <?php include './partials/header.php'; ?>
    <!-- HEADER -->

    <!-- CONTENT -->
    <div class="width">
        <!-- BANNER IKLAN -->
        <div class="banner_iklan">
            <div class="banner_big_iklan">
                <div class="owl-carousel owl-theme">
                    <?php
                    $banner_promo = $server->query("SELECT * FROM `banner_promo` ORDER BY `banner_promo`.`idbanner` DESC");
                    while ($banner_promo_data = mysqli_fetch_assoc($banner_promo)) {
                    ?>
                        <img src="./assets/image/banner/<?php echo $banner_promo_data['image']; ?>" class="img_banner_big_iklan">
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- KATEGORI -->
        <div class="box_kategori">
            <div class="kategori">
                <?php
                $kategori = $server->query("SELECT * FROM `kategori`");
                while ($kategori_data = mysqli_fetch_assoc($kategori)) {
                ?>
                    <a href="<?php echo $url; ?>category/list/<?php echo $kategori_data['id']; ?>">
                        <div class="isi_kategori">
                            <img src="./assets/icons/category/<?php echo $kategori_data['icon']; ?>">
                            <p><?php echo $kategori_data['nama']; ?></p>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- FLASH SALE -->
        <?php
        $select_fs = $server->query("SELECT * FROM `flashsale` WHERE `id_fs`='1' ");
        $data_fs = mysqli_fetch_assoc($select_fs);
        $wb_fs = $data_fs['waktu_berakhir'];
        $datenow_fs = time();
        if ($wb_fs > $datenow_fs) {
        ?>
            <div class="flash_sale">
                <div class="title_flash_sale">
                    <div class="box_title_flash_sale">
                        <div class="box_fs_res">
                            <i class="ri-flashlight-fill"></i>
                            <p>Flash Sale</p>
                        </div>
                        <div class="countdown_flash_sale">
                            <div id="days"></div>
                            <span id="td_days">:</span>
                            <div id="hours"></div>
                            <span>:</span>
                            <div id="minutes"></div>
                            <span>:</span>
                            <div id="seconds"></div>
                        </div>
                    </div>
                </div>
                <div class="box_iklan_flash_sale_1">
                    <div class="box_iklan_flash_sale">
                        <?php
                        $flash_sale = $server->query("SELECT * FROM `iklan` WHERE `tipe_iklan`='flash sale'");
                        while ($flash_sale_data = mysqli_fetch_assoc($flash_sale)) {
                            $hitung_diskon_fs = ($flash_sale_data['diskon'] / 100) * $flash_sale_data['harga'];
                            $harga_diskon_fs = $flash_sale_data['harga'] - $hitung_diskon_fs;
                            $terjual_fs = ($flash_sale_data['terjual'] / $flash_sale_data['stok']) * 100;
                            $exp_gambar_fs = explode(',', $flash_sale_data['gambar']);
                        ?>
                            <div class="iklan_flash_sale">
                                <a href="<?php echo $url; ?>product/view/<?php echo $flash_sale_data['id']; ?>">
                                    <div class="box_persen_flashsale">
                                        <p>-<?php echo $flash_sale_data['diskon']; ?>%</p>
                                    </div>
                                    <img src="./assets/image/product/<?php echo $exp_gambar_fs[0]; ?>">
                                    <div class="text_iklan_flash_sale">
                                        <h1><span>Rp</span> <?php echo number_format($harga_diskon_fs, 0, ".", "."); ?></h1>
                                        <div class="total_barang_flash_sale">
                                            <div class="persen_barang_flash_sale" style="width: <?php echo $terjual_fs; ?>%;"></div>
                                            <div class="text_barang_flash_sale">
                                                <p><?php echo $flash_sale_data['terjual']; ?> Terjual</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <!-- PRODUK TERBARU -->
        <div class="flash_sale">
            <div class="title_flash_sale">
                <div class="box_title_produk_terlaris">
                    <p>Produk Terbaru</p>
                </div>
                <!-- <a href="">
                    <div class="box_lihat_semua">
                        <p>Lihat Semua </p>
                        <i class="ri-arrow-right-s-line"></i>
                    </div>
                </a> -->
            </div>
            <div class="box_iklan_flash_sale grid_terlaris">
                <?php
                $produk_terlaris = $server->query("SELECT * FROM `iklan` WHERE `tipe_iklan`='' ORDER BY `id` DESC LIMIT 10");
                while ($produk_terlaris_data = mysqli_fetch_assoc($produk_terlaris)) {
                    $exp_gambar_pt = explode(',', $produk_terlaris_data['gambar']);
                ?>
                    <div class="list_produk">
                        <a href="<?php echo $url; ?>product/view/<?php echo $produk_terlaris_data['id']; ?>">
                            <img src="./assets/image/product/<?php echo $exp_gambar_pt[0]; ?>">
                            <div class="text_list_produk">
                                <div class="box_judul_list_produk">
                                    <p><?php echo $produk_terlaris_data['judul']; ?></p>
                                </div>
                                <div class="box_harga_list_produk">
                                    <h1><span>Rp</span> <?php echo number_format($produk_terlaris_data['harga'], 0, ".", "."); ?></h1>
                                    <p><?php echo $produk_terlaris_data['terjual']; ?> Terjual</p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- PRODUK TERLARIS -->
        <div class="flash_sale">
            <div class="title_flash_sale">
                <div class="box_title_produk_terlaris">
                    <p>Produk Terlaris</p>
                </div>
                <!-- <a href="">
                    <div class="box_lihat_semua">
                        <p>Lihat Semua </p>
                        <i class="ri-arrow-right-s-line"></i>
                    </div>
                </a> -->
            </div>
            <div class="box_iklan_flash_sale grid_terlaris">
                <?php
                $produk_terlaris = $server->query("SELECT * FROM `iklan` WHERE `tipe_iklan`='' ORDER BY `iklan`.`terjual` DESC LIMIT 10");
                while ($produk_terlaris_data = mysqli_fetch_assoc($produk_terlaris)) {
                    $exp_gambar_pt = explode(',', $produk_terlaris_data['gambar']);
                ?>
                    <div class="list_produk">
                        <a href="<?php echo $url; ?>product/view/<?php echo $produk_terlaris_data['id']; ?>">
                            <img src="./assets/image/product/<?php echo $exp_gambar_pt[0]; ?>">
                            <div class="text_list_produk">
                                <div class="box_judul_list_produk">
                                    <p><?php echo $produk_terlaris_data['judul']; ?></p>
                                </div>
                                <div class="box_harga_list_produk">
                                    <h1><span>Rp</span> <?php echo number_format($produk_terlaris_data['harga'], 0, ".", "."); ?></h1>
                                    <p><?php echo $produk_terlaris_data['terjual']; ?> Terjual</p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
    <input type="hidden" id="time_count_flash_sale" value="<?php echo date("d M Y H:i:s", $wb_fs); ?>">
    <!-- CONTENT -->

    <!-- BOTTOM NAVIGATION -->
    <?php include './partials/bottom-navigation.php'; ?>
    <!-- BOTTOM NAVIGATION -->

    <!-- FOOTER -->
    <?php include './partials/footer.php'; ?>
    <!-- FOOTER -->

    <!-- JS -->
    <script src="./assets/js/index.js"></script>
    <!-- JS -->
</body>

</html>