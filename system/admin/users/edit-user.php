<?php
include '../../../config.php';

$nama_lengkap_edt = mysqli_real_escape_string($server, $_POST['nama_lengkap_edt']);
$email_edt = mysqli_real_escape_string($server, $_POST['email_edt']);
$no_wa_edt = mysqli_real_escape_string($server, $_POST['no_wa_edt']);
$tipe_akun_edt = mysqli_real_escape_string($server, $_POST['tipe_akun_edt']);
$id_user_edit_akun = mysqli_real_escape_string($server, $_POST['id_user_edit_akun']);

$edit_akun = $server->query("UPDATE `akun` SET `nama_lengkap`='$nama_lengkap_edt',`email`='$email_edt',`no_whatsapp`='$no_wa_edt',`tipe_akun`='$tipe_akun_edt' WHERE `id`='$id_user_edit_akun'");

if ($edit_akun) {
?>
    <script>
        box_edit_akun.style.display = 'none';
        window.location.href = 'index.php';
    </script>
<?php
}
