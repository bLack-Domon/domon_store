<?php
include '../../config.php';

$id_invoice = $_POST['id_invoice'];
$id_provinsi = $_POST['id_provinsi'];
$id_kota = $_POST['id_kota'];
$alamat_lengkap = $_POST['alamat_lengkap'];
$id_kurir = '0';

$select_invoice_sl = $server->query("SELECT * FROM `invoice`, `iklan` WHERE invoice.idinvoice=$id_invoice AND invoice.id_iklan=iklan.id ");
$data_invoice_sl = mysqli_fetch_assoc($select_invoice_sl);

$berat_barang = $data_invoice_sl['berat'];
$jumlah_barang = $data_invoice_sl['jumlah'];

// API RAJA ONGKIR
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$id_kota&province=$id_provinsi",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: $rajaongkir_key"
    ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $kota_data_arr = json_decode($response, true);
    $kota_data = $kota_data_arr['rajaongkir']['results'];

    $provinsi_d = $kota_data['province'];
    $kota_d = $kota_data['city_name'];

    // LOKASI FOR INVOICE
    $provinsi_inv = $id_provinsi . ',' . $provinsi_d;
    $kota_inv = $id_kota . ',' . $kota_d;

    $select_lokasi_user = $server->query("SELECT * FROM `lokasi_user` WHERE `id_user`='$iduser'");
    $data_lokasi_user = mysqli_fetch_assoc($select_lokasi_user);

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
        CURLOPT_POSTFIELDS => "origin=$kota_id_toko&destination=$id_kota&weight=$berat_barang&courier=jne",
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
        $harga_ongkir =  $data_cost_jne_arr[$id_kurir]['cost']['0']['value'] * $jumlah_barang;
    }

    if ($data_lokasi_user) {
        $update_lokasi = $server->query("UPDATE `lokasi_user` SET `provinsi`='$provinsi_d', `id_provinsi`='$id_provinsi', `kota`='$kota_d', `id_kota`='$id_kota', `alamat_lengkap`='$alamat_lengkap' WHERE `id_user`='$iduser'");
        $update_lokasi_invoice = $server->query("UPDATE `invoice` SET `provinsi`='$provinsi_inv',`kota`='$kota_inv',`alamat_lengkap`='$alamat_lengkap', `kurir`='$kurir_ongkir', `id_kurir`='$id_kurir', `layanan_kurir`='$kurir_layanan_ongkir', `etd`='$etd_ongkir', `harga_ongkir`='$harga_ongkir' WHERE `idinvoice`='$id_invoice'");
        if ($update_lokasi || $update_lokasi_invoice) {
?>
            <script>
                setting_lokasi.style.display = 'none';
                window.location.href = '';
            </script>
        <?php
        }
    } else {
        $insert_lokasi = $server->query("INSERT INTO `lokasi_user`(`id_user`, `provinsi`, `id_provinsi`, `kota`, `id_kota`, `alamat_lengkap`) VALUES ('$iduser', '$provinsi_d', '$id_provinsi', '$kota_d', '$id_kota', '$alamat_lengkap')");
        $update_lokasi_invoice = $server->query("UPDATE `invoice` SET `provinsi`='$provinsi_inv',`kota`='$kota_inv',`alamat_lengkap`='$alamat_lengkap', `kurir`='$kurir_ongkir', `id_kurir`='$id_kurir', `layanan_kurir`='$kurir_layanan_ongkir', `etd`='$etd_ongkir', `harga_ongkir`='$harga_ongkir' WHERE `idinvoice`='$id_invoice'");
        if ($insert_lokasi || $update_lokasi_invoice) {
        ?>
            <script>
                setting_lokasi.style.display = 'none';
                window.location.href = '';
            </script>
<?php
        }
    }
}
