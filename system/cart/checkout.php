<?php
include '../../config.php';

$idproduk = $_POST['id_product'];

// SELECT CART
$select_cart = $server->query("SELECT * FROM `keranjang` WHERE `id_iklan`='$idproduk' AND `id_user`='$iduser'");
$cart_data = mysqli_fetch_assoc($select_cart);

// SELECT PRODUK
$select_iklan = $server->query("SELECT * FROM `iklan` WHERE `id`='$idproduk'");
$iklan_data = mysqli_fetch_assoc($select_iklan);

// SELECT LOKASI USER
$lokasi_user = $server->query("SELECT * FROM `lokasi_user` WHERE `id_user`='$iduser'");
$lokasi_user_data = mysqli_fetch_assoc($lokasi_user);

if ($_POST['tipe_checkout'] == 'keranjang') {
    $id_iklan = $cart_data['id_iklan'];
    $jumlah = $cart_data['jumlah'];
    $harga_k = $cart_data['harga_k'];
    $diskon_k = $cart_data['diskon_k'];
    $warna_k = $cart_data['warna_k'];
    $ukuran_k = $cart_data['ukuran_k'];
} else {
    $id_iklan = $iklan_data['id'];
    $jumlah = $_POST['jumlah_product'];
    $harga_k = $_POST['ukuran_harga_satuan_value_send'];
    $diskon_k = $iklan_data['diskon'];
    $warna_k = $_POST['warna_k_val'];
    $ukuran_k = $_POST['ukuran_k_val'];
}

$time = date('Y-m-d H:i:s');
$tipe_progress = 'Belum Bayar';

$kurir = 'jne';
$id_kurir = '0';
$berat_barang = $iklan_data['berat'];

$cek_invoice = $server->query("SELECT * FROM `invoice` WHERE `id_iklan`='$idproduk' AND `id_user`='$iduser'");
$cek_invoice_data = mysqli_fetch_assoc($cek_invoice);

if ($cek_invoice_data) {
    $idinvoice_cko = $cek_invoice_data['idinvoice'];
    $update_invoice = $server->query("UPDATE `invoice` SET `jumlah`='$jumlah',`harga_i`='$harga_k',`diskon_i`='$diskon_k' WHERE `idinvoice`='$idinvoice_cko' AND `id_user`='$iduser'");
    $delete_cart_ck = $server->query("DELETE FROM `keranjang` WHERE `id_iklan`='$idproduk' AND `id_user`='$iduser'");
    if ($update_invoice || $delete_cart_ck) {
?>
        <script>
            window.location.href = "<?php echo $url; ?>checkout/detail/<?php echo $idinvoice_cko; ?>";
        </script>
    <?php
    }
} else {
    if ($lokasi_user_data) {
        $prov_inv = $lokasi_user_data['id_provinsi'] . ',' . $lokasi_user_data['provinsi'];
        $kota_inv = $lokasi_user_data['id_kota'] . ',' . $lokasi_user_data['kota'];
        $alengkap_inv = $lokasi_user_data['alamat_lengkap'];

        $kota_tujuan = $lokasi_user_data['id_kota'];
        // JNE
        $curl_jne = curl_init();
        curl_setopt_array($curl_jne, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$kota_id_toko&destination=$kota_tujuan&weight=$berat_barang&courier=$kurir",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $rajaongkir_key"
            ),
        ));
        $response_cost_jne = curl_exec($curl_jne);
        $err_cost_jne = curl_error($curl_jne);
        curl_close($curl_jne);
        if ($err_cost_jne) {
            echo "cURL Error #:" . $err_cost_jne;
        } else {
            $data_cost_jne = json_decode($response_cost_jne, true);
            $data_cost_jne_arr = $data_cost_jne['rajaongkir']['results']['0']['costs'];
            $kurir_ongkir = $data_cost_jne['rajaongkir']['results']['0']['code'];
            $kurir_layanan_ongkir = $data_cost_jne_arr[$id_kurir]['service'];
            $etd_ongkir = $data_cost_jne_arr[$id_kurir]['cost']['0']['etd'];
            $harga_ongkir =  $data_cost_jne_arr[$id_kurir]['cost']['0']['value'] * $jumlah;
        }
        $insert_checkout = $server->query("INSERT INTO `invoice`(`id_iklan`, `id_user`, `jumlah`, `warna_i`, `ukuran_i`, `harga_i`, `diskon_i`, `kurir`, `id_kurir`, `layanan_kurir`, `etd`, `harga_ongkir`, `provinsi`, `kota`, `alamat_lengkap`, `waktu`, `tipe_progress`) VALUES ('$id_iklan', '$iduser', '$jumlah', '$warna_k', '$ukuran_k', '$harga_k', '$diskon_k', '$kurir_ongkir', '$id_kurir', '$kurir_layanan_ongkir', '$etd_ongkir', '$harga_ongkir', '$prov_inv', '$kota_inv', '$alengkap_inv', '$time', '$tipe_progress')");
    } else {
        $insert_checkout = $server->query("INSERT INTO `invoice`(`id_iklan`, `id_user`, `jumlah`, `warna_i`, `ukuran_i`, `harga_i`, `diskon_i`, `kurir`, `id_kurir`, `waktu`, `tipe_progress`) VALUES ('$id_iklan', '$iduser', '$jumlah', '$warna_k', '$ukuran_k', '$harga_k', '$diskon_k', '$kurir', '$id_kurir', '$time', '$tipe_progress')");
    }
    $delete_cart_ck = $server->query("DELETE FROM `keranjang` WHERE `id_iklan`='$idproduk' AND `id_user`='$iduser'");
    if ($insert_checkout || $delete_cart_ck) {
        $select_invoice = $server->query("SELECT * FROM `invoice` WHERE `id_iklan`='$idproduk' AND `id_user`='$iduser'");
        $invoice_data = mysqli_fetch_assoc($select_invoice);
        $idinvoice_cko = $invoice_data['idinvoice'];
    ?>
        <script>
            window.location.href = "<?php echo $url; ?>checkout/detail/<?php echo $idinvoice_cko; ?>";
        </script>
<?php
    }
}
