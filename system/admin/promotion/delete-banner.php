<?php
include '../../../config.php';

$val_id_banner = $_POST['val_id_banner'];

$delete_banner = $server->query("DELETE FROM `banner_promo` WHERE `idbanner`='$val_id_banner' ");

if ($delete_banner) {
?>
    <script>
        confirm_hapus.style.display = 'none';
        val_id_banner.value = '';
        window.location.href = 'index.php';
    </script>
<?php
}
?>