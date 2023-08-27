<?php
include '../../config.php';

$iduser = $profile['id'];
$idproduk = $_POST['idproduk'];
$jumlah_produk = $_POST['jumlah_produk'];

$warna_value = $_POST['warna_value'];
$ukuran_value = $_POST['ukuran_value'];
$ukuran_harga_satuan_value_send = $_POST['ukuran_harga_satuan_value_send'];

$time = date("Y-m-d H:i:s");

$cart = $server->query("SELECT * FROM `keranjang` WHERE `id_iklan`='$idproduk' AND `id_user`='$iduser'");
$cart_data = mysqli_fetch_assoc($cart);

if (!$cart_data) {
    $select_produk_cart = $server->query("SELECT * FROM `iklan` WHERE `id`='$idproduk'");
    $produk_data_cart = mysqli_fetch_assoc($select_produk_cart);
    $diskon_cart = $produk_data_cart['diskon'];

    $insert_cart = $server->query("INSERT INTO `keranjang`(`id_iklan`, `id_user`, `jumlah`, `harga_k`, `diskon_k`, `warna_k`, `ukuran_k`, `waktu`) VALUES ('$idproduk', '$iduser', '$jumlah_produk', '$ukuran_harga_satuan_value_send', '$diskon_cart', '$warna_value', '$ukuran_value', '$time')");
    if ($insert_cart) {
?>
        <script>
            window.location.href = '<?php echo $url; ?>cart/';
        </script>
<?php
    }
}
?>