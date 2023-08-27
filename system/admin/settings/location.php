<?php

use phpseclib3\Crypt\EC;

include '../../../config.php';

$exp_provinsi_ls = explode(',', $_POST['provinsi_ls']);
$exp_kota_ls = explode(',', $_POST['kota_ls']);

$prov_name_ls = $exp_provinsi_ls[1];
$prov_id_ls = $exp_provinsi_ls[0];
$kota_name_ls = $exp_kota_ls[1];
$kota_id_ls = $exp_kota_ls[0];

$update_lokasi_toko = $server->query("UPDATE `setting_lokasi` SET `provinsi`='$prov_name_ls',`kota`='$kota_name_ls',`provinsi_id`='$prov_id_ls',`kota_id`='$kota_id_ls' WHERE `id`='1' ");

if ($update_lokasi_toko) {
?>
    <script>
        text_s_lc.innerHTML = 'Berhasil Disimpan';
        setTimeout(() => {
            text_s_lc.innerHTML = 'Simpan';
        }, 3000);
    </script>
<?php
}
