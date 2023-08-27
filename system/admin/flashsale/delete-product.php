<?php
include '../../../config.php';

$val_id_h_produk = $_POST['val_id_h_produk'];

$delete_pro_fs = $server->query("UPDATE `iklan` SET `diskon`='0',`tipe_iklan`='' WHERE `id`='$val_id_h_produk' ");

if ($delete_pro_fs) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
?>