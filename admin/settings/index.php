<?php
include '../../config.php';
include '../../system/location/provinsi.php';

$page_admin = 'pengaturan';

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
    <title>Admin Pengaturan</title>
    <link rel="icon" href="../../assets/icons/<?php echo $logo; ?>" type="image/svg">
    <link rel="stylesheet" href="../../assets/css/admin/settings/index.css">
</head>

<body>
    <div class="admin">
        <?php include '../partials/menu.php'; ?>
        <div class="content_admin">
            <h1 class="title_content_admin">Pengaturan</h1>
            <div class="isi_content_admin">
                <!-- CONTENT -->
                <div class="settings_adm">
                    <div class="menu_settings_adm">
                        <div class="box_menu_settings_adm">
                            <div class="isi_menu_settings_adm" id="p_header_setting">Header</div>
                            <div class="isi_menu_settings_adm" id="p_footer_setting">Footer</div>
                            <div class="isi_menu_settings_adm" id="p_apikey_setting">Api Key</div>
                            <div class="isi_menu_settings_adm" id="p_lokasi_setting">Lokasi Pengiriman</div>
                            <div class="isi_menu_settings_adm" id="p_metode_pembayaran">Metode Pembayaran</div>
                            <div class="isi_menu_settings_adm" id="p_email_smtp">Email SMTP</div>
                        </div>
                    </div>
                    <div class="isi_settings_adm">
                        <!-- HEADER -->
                        <div class="box_isi_settings_adm" id="header_setting">
                            <h1>Header</h1>
                            <div class="box_logo_hs">
                                <img src="../../assets/icons/<?php echo $logo; ?>" id="view_logo_hs">
                                <div class="text_box_logo_hs">
                                    <h1 onclick="c_ubah_logo()">Ubah Logo <i class="ri-pencil-fill"></i></h1>
                                    <p>Pastikan logo berformat svg atau png dan aspect ratio 1:1</p>
                                    <p id="err_foto_hs">File bukan format svg atau png</p>
                                </div>
                                <input type="file" id="ubah_logo_cf_hs" onchange="change_ubah_logo(event)" accept="image/*">
                            </div>
                            <div class="box_form_set_adm1">
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input">Nama Website</p>
                                    <input type="text" class="input" id="nama_perusahaan_hs" placeholder="Masukkan Nama Perusahaan" value="<?php echo $title_name; ?>">
                                </div>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input">Placeholder Search</p>
                                    <input type="text" class="input" id="placeh_search_hs" placeholder="Masukkan Placeholder Search" value="<?php echo $placeholder_search; ?>">
                                </div>
                            </div>
                            <div class="box_button_set_adm">
                                <div class="button" onclick="simpan_header()">
                                    <p id="text_s_hs">Simpan</p>
                                    <img src="../../assets/icons/loading-w.svg" class="loading_s" id="loading_s_hs">
                                </div>
                            </div>
                        </div>
                        <!-- HEADER -->

                        <!-- FOOTER -->
                        <div class="box_isi_settings_adm" id="footer_setting">
                            <h1>Footer</h1>
                            <div class="box_form_set_adm2">
                                <?php
                                $select_social_fo = $server->query("SELECT * FROM `setting_footer`");
                                while ($data_social_fo = mysqli_fetch_assoc($select_social_fo)) {
                                ?>
                                    <div class="isi_box_form_set_adm1">
                                        <p class="p_input" id="p_link_social_fo<?php echo $data_social_fo['id_fo']; ?>"><?php echo $data_social_fo['icon_social'] ?> <?php echo $data_social_fo['name_social']; ?> Link</p>
                                        <input type="text" class="input" placeholder="Tambahkan Link" id="link_social_fo<?php echo $data_social_fo['id_fo']; ?>" value="<?php echo $data_social_fo['link_social']; ?>">
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="box_button_set_adm">
                                <div class="button" onclick="simpan_footer()">
                                    <p id="text_s_fo">Simpan</p>
                                    <img src="../../assets/icons/loading-w.svg" class="loading_s" id="loading_s_fo">
                                </div>
                            </div>
                        </div>
                        <!-- FOOTER -->

                        <!-- API KEY -->
                        <div class="box_isi_settings_adm" id="apikey_setting">
                            <h1>Api Key</h1>
                            <div class="box_form_set_adm1">
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_google_client_id_key_ak">Google Client ID Key</p>
                                    <input type="text" class="input" id="google_client_id_key_ak" placeholder="Masukkan Google Client ID Key" value="<?php echo $google_client_id; ?>">
                                </div>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_google_client_secret_key_ak">Google Client Secret Key</p>
                                    <input type="text" class="input" id="google_client_secret_key_ak" placeholder="Masukkan Google Client Secret Key" value="<?php echo $google_client_secret; ?>">
                                </div>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_midtrans_client_key_ak">Midtrans Client Key</p>
                                    <input type="text" class="input" id="midtrans_client_key_ak" placeholder="Masukkan Midtrans Client Key" value="<?php echo $midtrans_client_key; ?>">
                                </div>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_midtrans_server_key_ak">Midtrans Server Key</p>
                                    <input type="text" class="input" id="midtrans_server_key_ak" placeholder="Masukkan Midtrans Server Key" value="<?php echo $midtrans_server_key; ?>">
                                </div>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_raja_ongkir_key_ak">Raja Ongkir Key</p>
                                    <input type="text" class="input" id="raja_ongkir_key_ak" placeholder="Masukkan Raja Ongkir Key" value="<?php echo $rajaongkir_key; ?>">
                                </div>
                            </div>
                            <div class="box_button_set_adm">
                                <div class="button" onclick="simpan_apikey()">
                                    <p id="text_s_ak">Simpan</p>
                                    <img src="../../assets/icons/loading-w.svg" class="loading_s" id="loading_s_ak">
                                </div>
                            </div>
                        </div>
                        <!-- API KEY -->

                        <!-- LOKASI -->
                        <div class="box_isi_settings_adm" id="lokasi_setting">
                            <h1>Lokasi Pengiriman</h1>
                            <div class="box_form_set_adm1">
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_provinsi_ls">Provinsi</p>
                                    <select class="input" id="provinsi_ls" onchange="change_provinsi()">
                                        <option value="<?php echo $provinsi_id_toko . ',' . $provinsi_toko; ?>" selected disabled hidden><?php echo $provinsi_toko; ?></option>
                                        <?php
                                        foreach ($provinsi_isi_data as $key_provinsi_isi_data => $value_provinsi_isi_data) {
                                        ?>
                                            <option value="<?php echo $value_provinsi_isi_data['province_id'] . ',' . $value_provinsi_isi_data['province']; ?>"><?php echo $value_provinsi_isi_data['province']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_kota_ls">Kota</p>
                                    <select class="input" id="kota_ls">
                                        <option value="<?php echo $kota_id_toko . ',' . $kota_toko; ?>" selected disabled hidden><?php echo $kota_toko; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="box_button_set_adm">
                                <div class="button" onclick="simpan_lokasi()">
                                    <p id="text_s_lc">Simpan</p>
                                    <img src="../../assets/icons/loading-w.svg" class="loading_s" id="loading_s_lc">
                                </div>
                            </div>
                        </div>
                        <!-- LOKASI -->

                        <!-- METODE PEMBAYARAN -->
                        <div class="box_isi_settings_adm" id="metode_pembayaran_setting">
                            <h1>Metode Pembayaran</h1>
                            <div class="box_form_set_adm1">
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_provinsi_ls">Pilih Metode Pembayaran</p>
                                    <select class="input" id="inp_tipe_mp">
                                        <option value="<?php echo $nama_tipe_pembayaran; ?>" selected disabled hidden><?php echo $nama_tipe_pembayaran; ?></option>
                                        <option value="Midtrans">Midtrans</option>
                                        <option value="Manual">Manual</option>
                                    </select>
                                </div>
                                <?php
                                $select_norek_adm = $server->query("SELECT * FROM `nomor_rekening` WHERE `idnorek`='1' ");
                                $data_norek_adm = mysqli_fetch_assoc($select_norek_adm);
                                ?>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_nama_bank">Nama Bank</p>
                                    <input type="text" class="input" id="nama_bank" placeholder="Nama Bank..." value="<?php echo $data_norek_adm['nama_bank']; ?>">
                                </div>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_norek">Nomor Rekening</p>
                                    <input type="text" class="input" id="norek" placeholder="Nomor Rekening..." value="<?php echo $data_norek_adm['norek']; ?>">
                                </div>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_atas_nama">Atas Nama</p>
                                    <input type="text" class="input" id="atas_nama" placeholder="Atas Nama..." value="<?php echo $data_norek_adm['an']; ?>">
                                </div>
                            </div>
                            <div class="box_button_set_adm">
                                <div class="button" onclick="simpan_metode_pembayaran()">
                                    <p id="text_s_lmp">Simpan</p>
                                    <img src="../../assets/icons/loading-w.svg" class="loading_s" id="loading_s_lmp">
                                </div>
                            </div>
                        </div>
                        <!-- METODE PEMBAYARAN -->

                        <!-- EMAIL SMTP -->
                        <div class="box_isi_settings_adm" id="email_smtp_setting">
                            <h1>Email SMTP</h1>
                            <div class="box_form_set_adm1">
                                <?php
                                $select_email_setting_adm_set = $server->query("SELECT * FROM `setting_email` WHERE `id`='1' ");
                                $data_email_setting_adm_set = mysqli_fetch_array($select_email_setting_adm_set);
                                ?>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_email_notif_adm">Email Notif Untuk Admin</p>
                                    <input type="text" class="input" id="email_notif_adm" placeholder="Masukkan Email Notif Untuk Admin" value="<?php echo $data_email_setting_adm_set['email_notif']; ?>">
                                </div>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_host_smtp">Host SMTP</p>
                                    <input type="text" class="input" id="host_smtp" placeholder="Masukkan Host SMTP" value="<?php echo $data_email_setting_adm_set['host_smtp']; ?>">
                                </div>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_port_smtp">Port SMTP</p>
                                    <input type="text" class="input" id="port_smtp" placeholder="Masukkan Port SMTP" value="<?php echo $data_email_setting_adm_set['port_smtp']; ?>">
                                </div>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_username_smtp">Username SMTP</p>
                                    <input type="text" class="input" id="username_smtp" placeholder="Masukkan Username SMTP" value="<?php echo $data_email_setting_adm_set['username_smtp']; ?>">
                                </div>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_password_smtp">Password SMTP</p>
                                    <input type="text" class="input" id="password_smtp" placeholder="Masukkan Password SMTP" value="<?php echo $data_email_setting_adm_set['password_smtp']; ?>">
                                </div>
                                <div class="isi_box_form_set_adm1">
                                    <p class="p_input" id="p_setfrom_smtp">Nama Pengirim SMTP</p>
                                    <input type="text" class="input" id="setfrom_smtp" placeholder="Masukkan Nama Pengirim SMTP" value="<?php echo $data_email_setting_adm_set['setfrom_smtp']; ?>">
                                </div>
                            </div>
                            <div class="box_button_set_adm">
                                <div class="button" onclick="simpan_email_smtp()">
                                    <p id="text_s_esmtp">Simpan</p>
                                    <img src="../../assets/icons/loading-w.svg" class="loading_s" id="loading_s_esmtp">
                                </div>
                            </div>
                        </div>
                        <!-- EMAIL SMTP -->
                    </div>
                </div>
                <!-- CONTENT -->
            </div>
        </div>
    </div>
    <div id="res"></div>

    <!-- JS -->
    <script src="../../assets/js/admin/settings/index.js"></script>
    <!-- JS -->
</body>

</html>