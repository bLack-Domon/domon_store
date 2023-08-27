<div class="back_bot_nav"></div>
<div class="bot_nav_cover">
    <div class="bot_nav">
        <a href="<?php echo $url; ?>">
            <div class="isi_bot_nav">
                <?php
                if ($page == "HOME") {
                ?>
                    <h4 class="ri-home-fill"></h4>
                    <h5>Beranda</h5>
                <?php
                } else {
                ?>
                    <i class="ri-home-line"></i>
                    <p>Beranda</p>
                <?php
                }
                ?>
            </div>
        </a>
        <a href="<?php echo $url; ?>cart/">
            <div class="isi_bot_nav">
                <?php
                if ($page == "KERANJANG") {
                ?>
                    <?php
                    if (isset($_COOKIE['login'])) {
                        if ($cek_cart_header) {
                    ?>
                            <h3><?php echo $cek_cart_header; ?></h3>
                    <?php
                        }
                    }
                    ?>
                    <h4 class="ri-shopping-bag-fill"></h4>
                    <h5>Keranjang</h5>
                <?php
                } else {
                ?>
                    <?php
                    if (isset($_COOKIE['login'])) {
                        if ($cek_cart_header) {
                    ?>
                            <h3><?php echo $cek_cart_header; ?></h3>
                    <?php
                        }
                    }
                    ?>
                    <i class="ri-shopping-bag-line"></i>
                    <p>Keranjang</p>
                <?php
                }
                ?>
            </div>
        </a>
        <a href="<?php echo $url; ?>notification/">
            <div class="isi_bot_nav">
                <?php
                if ($page == "NOTIFIKASI") {
                ?>
                    <?php
                    if (isset($_COOKIE['login'])) {
                        if ($cek_notif_header) {
                    ?>
                            <h3><?php echo $cek_notif_header; ?></h3>
                    <?php
                        }
                    }
                    ?>
                    <h4 class="ri-notification-3-fill"></h4>
                    <h5>Notifikasi</h5>
                <?php
                } else {
                ?>
                    <?php
                    if (isset($_COOKIE['login'])) {
                        if ($cek_notif_header) {
                    ?>
                            <h3><?php echo $cek_notif_header; ?></h3>
                    <?php
                        }
                    }
                    ?>
                    <i class="ri-notification-3-line"></i>
                    <p>Notifikasi</p>
                <?php
                }
                ?>
            </div>
        </a>
        <a href="<?php if (isset($_COOKIE['login'])) {
                        echo $url . 'profile/user';
                    } else {
                        echo $url . 'login';
                    } ?>">
            <div class="isi_bot_nav">
                <?php
                if ($page == "PROFILE") {
                ?>
                    <h4 class="ri-user-4-fill"></h4>
                    <h5>Profile</h5>
                <?php
                } else {
                ?>
                    <i class="ri-user-4-line"></i>
                    <p>Profile</p>
                <?php
                }
                ?>
            </div>
        </a>
    </div>
</div>