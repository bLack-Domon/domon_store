<?php
include '../../../config.php';

$email_notif_adm = $_POST['email_notif_adm'];
$host_smtp = $_POST['host_smtp'];
$port_smtp = $_POST['port_smtp'];
$username_smtp = $_POST['username_smtp'];
$password_smtp = $_POST['password_smtp'];
$setfrom_smtp = $_POST['setfrom_smtp'];

$update_email_smtp_adm = $server->query("UPDATE `setting_email` SET `email_notif`='$email_notif_adm',`host_smtp`='$host_smtp',`port_smtp`='$port_smtp',`username_smtp`='$username_smtp',`password_smtp`='$password_smtp',`setfrom_smtp`='$setfrom_smtp' WHERE `id`='1' ");

if ($update_email_smtp_adm) {
?>
    <script>
        text_s_esmtp.innerHTML = 'Berhasil Disimpan';
        setTimeout(() => {
            text_s_esmtp.innerHTML = 'Simpan';
        }, 3000);
    </script>
<?php
}
?>