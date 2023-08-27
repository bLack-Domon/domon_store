<?php
include '../../config.php';

$id_invoice = $_POST['id_invoice'];
$name_kurir = $_POST['name_kurir'];
$idarr_kurir = $_POST['idarr_kurir'];
$kurir_layanan_ongkir = $_POST['kurir_layanan_ongkir'];
$etd_ongkir = $_POST['etd_ongkir'];
$harga_ongkir = $_POST['harga_ongkir'];

$ubah_ongkir = $server->query("UPDATE `invoice` SET `kurir`='$name_kurir', `id_kurir`='$idarr_kurir', `layanan_kurir`='$kurir_layanan_ongkir', `etd`='$etd_ongkir', `harga_ongkir`='$harga_ongkir' WHERE `idinvoice`='$id_invoice' AND `id_user`='$iduser'");

if ($ubah_ongkir) {
?>
    <script>
        window.location.href = '';
    </script>
<?php
}
