<?php
include '../../../config.php';

$val_id_kategori = $_POST['val_id_kategori'];

$hapus_kategori_adm = $server->query("DELETE FROM `kategori` WHERE `id`='$val_id_kategori' ");

if ($hapus_kategori_adm) {
?>
    <script>
        confirm_hapus.style.display = 'none';
        val_id_kategori.value = '';
        window.location.href = 'index.php';
    </script>
<?php
}
?>