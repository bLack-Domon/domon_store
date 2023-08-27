<div class="header_responsive_admin" onclick="show_box_menu_admin()">
    <i class="fas fa-bars"></i>
    <p>Menu Admin</p>
</div>
<div class="box_menu_admin" id="box_menu_admin">
    <div class="menu_admin">
        <div class="menu_profile_admin">
            <img src="<?php echo $url; ?>assets/image/profile/<?php echo $profile_adm['foto']; ?>">
            <p><?php echo $profile_adm['nama_lengkap']; ?></p>
        </div>
        <div class="menu_list">
            <a href="<?php echo $url; ?>admin">
                <div class="<?php if ($page_admin == 'dashboard') {
                                echo 'menu_list_isi_active';
                            } else {
                                echo 'menu_list_isi';
                            } ?>">
                    <div class="box_icon_menu_list_isi">
                        <i class="fas fa-th-large"></i>
                    </div>
                    <p>Dashboard</p>
                </div>
            </a>
            <a href="<?php echo $url; ?>admin/product">
                <div class="<?php if ($page_admin == 'produk') {
                                echo 'menu_list_isi_active';
                            } else {
                                echo 'menu_list_isi';
                            } ?>">
                    <div class="box_icon_menu_list_isi">
                        <i class="fas fa-box"></i>
                    </div>
                    <p>Produk</p>
                </div>
            </a>
            <a href="<?php echo $url; ?>admin/category">
                <div class="<?php if ($page_admin == 'kategori') {
                                echo 'menu_list_isi_active';
                            } else {
                                echo 'menu_list_isi';
                            } ?>">
                    <div class="box_icon_menu_list_isi">
                        <i class="fas fa-th-list"></i>
                    </div>
                    <p>Kategori</p>
                </div>
            </a>
            <a href="<?php echo $url; ?>admin/users">
                <div class="<?php if ($page_admin == 'user') {
                                echo 'menu_list_isi_active';
                            } else {
                                echo 'menu_list_isi';
                            } ?>">
                    <div class="box_icon_menu_list_isi">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <p>Akun User</p>
                </div>
            </a>
            <a href="<?php echo $url; ?>admin/promotion">
                <div class="<?php if ($page_admin == 'promo') {
                                echo 'menu_list_isi_active';
                            } else {
                                echo 'menu_list_isi';
                            } ?>">
                    <div class="box_icon_menu_list_isi">
                        <i class="fas fa-sticky-note"></i>
                    </div>
                    <p>Banner Promo</p>
                </div>
            </a>
            <a href="<?php echo $url; ?>admin/transaction">
                <div class="<?php if ($page_admin == 'transaksi') {
                                echo 'menu_list_isi_active';
                            } else {
                                echo 'menu_list_isi';
                            } ?>">
                    <div class="box_icon_menu_list_isi">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <p>Transaksi</p>
                </div>
            </a>
            <a href="<?php echo $url; ?>admin/flashsale">
                <div class="<?php if ($page_admin == 'flashsale') {
                                echo 'menu_list_isi_active';
                            } else {
                                echo 'menu_list_isi';
                            } ?>">
                    <div class="box_icon_menu_list_isi">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <p>Flash Sale</p>
                </div>
            </a>
            <div class="line_menu_list"></div>
            <a href="<?php echo $url; ?>admin/settings">
                <div class="<?php if ($page_admin == 'pengaturan') {
                                echo 'menu_list_isi_active';
                            } else {
                                echo 'menu_list_isi';
                            } ?>">
                    <div class="box_icon_menu_list_isi">
                        <i class="fas fa-cog"></i>
                    </div>
                    <p>Pengaturan</p>
                </div>
            </a>
            <a href="<?php echo $url; ?>system/admin/logout">
                <div class="menu_list_isi">
                    <div class="box_icon_menu_list_isi">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <p>Log Out</p>
                </div>
            </a>
        </div>
    </div>
</div>
<script src="<?php echo $url; ?>assets/js/admin/menu.js"></script>