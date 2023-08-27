<?php
include '../../../config.php';

$val_id_h_produk = $_POST['val_id_h_produk'];

$delete_produk_adm = $server->query("UPDATE `iklan` SET `status`='delete' WHERE `id`='$val_id_h_produk' ");

if ($delete_produk_adm) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
?>