<?php
include '../../../config.php';

$val_id_user = $_POST['val_id_user'];

$hapus_akun = $server->query("DELETE FROM `akun` WHERE `id`='$val_id_user'");

if ($hapus_akun) {
?>
    <script>
        var add_box_users = 'isi_all_users_admin' + <?php echo $val_id_user; ?>;
        document.getElementById(add_box_users).style.display = 'none';
        confirm_hapus.style.display = 'none';
    </script>
<?php
} else {
?>
    <script>
        confirm_hapus.style.display = 'none';
    </script>
<?php
}
