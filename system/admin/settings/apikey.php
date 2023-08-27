<?php
include '../../../config.php';

$google_client_id_key_ak = $_POST['google_client_id_key_ak'];
$google_client_secret_key_ak = $_POST['google_client_secret_key_ak'];
$midtrans_client_key_ak = $_POST['midtrans_client_key_ak'];
$midtrans_server_key_ak = $_POST['midtrans_server_key_ak'];
$raja_ongkir_key_ak = $_POST['raja_ongkir_key_ak'];

$update_apikey_adm = $server->query("UPDATE `setting_apikey` SET `google_client_id`='$google_client_id_key_ak',`google_client_secret`='$google_client_secret_key_ak',`midtrans_client_key`='$midtrans_client_key_ak',`midtrans_server_key`='$midtrans_server_key_ak',`rajaongkir_key`='$raja_ongkir_key_ak' WHERE `id_apikey`='1'");

if ($update_apikey_adm) {
?>
    <script>
        text_s_ak.innerHTML = 'Berhasil Disimpan';
        setTimeout(() => {
            text_s_ak.innerHTML = 'Simpan';
        }, 2000);
    </script>
<?php
}
