<header>
    <div class="width">
        <div class="header">
            <a href="<?php echo $url; ?>">
                <div class="logo_header">
                    <img src="<?php echo $url; ?>assets/icons/<?php echo $logo; ?>" class="svg_logo_header">
                    <p>bLack Domon Store</p>
                </div>
            </a>
            <div class="box_search_header">
                <div class="search_header">
                    <input type="text" placeholder="<?php echo $placeholder_search; ?>" id="search_header" oninput="SearchHeader('<?php echo $url; ?>')">
                    <button><i class="ri-search-line"></i></button>
                </div>
                <div class="res_search_header" id="res_search_header">
                    <center><img src="<?php echo $url; ?>assets/icons/loading-o.svg" class="loading_res_search_header" id="loading_res_search_header"></center>
                    <div id="isi_res_search_header"></div>
                </div>
            </div>
            <div class="menu_header">
                <div class="profile_menu_header">
                    <?php
                    if (isset($_COOKIE['login'])) {
                    ?>
                        <a href="<?php echo $url; ?>cart">
                            <div class="box_icon_menu_header">
                                <?php
                                if ($cek_cart_header) {
                                ?>
                                    <p><?php echo $cek_cart_header; ?></p>
                                <?php
                                }
                                ?>
                                <i class="ri-shopping-bag-line"></i>
                            </div>
                        </a>
                        <a href="<?php echo $url; ?>notification/">
                            <div class="box_icon_menu_header">
                                <?php
                                if ($cek_notif_header) {
                                ?>
                                    <p><?php echo $cek_notif_header; ?></p>
                                <?php
                                }
                                ?>
                                <h5 class="ri-notification-3-line"></h5>
                            </div>
                        </a>
                        <a href="<?php echo $url; ?>profile/user">
                            <div class="box_img_menu_header">
                                <img src="<?php echo $url; ?>assets/image/profile/<?php echo $profile['foto']; ?>">
                            </div>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href="<?php echo $url; ?>register/">Daftar</a>
                        <p>|</p>
                        <a href="<?php echo $url; ?>login/">Masuk</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="back_header"></div>
<script src="<?php echo $url; ?>assets/js/partials/header.js"></script>