<?php
include '../../config.php';

$idproduk = $_POST['id_product'];
$page_product = $_POST['page_product'];

$delete_cart = $server->query("DELETE FROM `keranjang` WHERE `id_iklan`='$idproduk' AND `id_user`='$iduser'");

if ($page_product == 'produk view') {
?>
    <script>
        masukan_keranjang2.style.display = 'flex';
        loading_keranjang.style.display = 'none';
        hapus_keranjang.style.display = 'none';
    </script>
<?php
}
