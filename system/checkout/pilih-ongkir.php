<?php
include '../../config.php';

$kota_tujuan  = $_POST['id_kota_tujuan_v'];
$berat_barang = $_POST['berat_barang'];
$jumlah_barang = $_POST['jumlah_barang'];

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
    CURLOPT_POSTFIELDS => "origin=$kota_id_toko&destination=$kota_tujuan&weight=$berat_barang&courier=jne",
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
    foreach ($data_cost_jne_arr as $keykon => $valuekon) {
        $kurir_ongkir = $data_cost_jne['rajaongkir']['results']['0']['code'];
        $kurir_layanan_ongkir = $data_cost_jne_arr[$keykon]['service'];
        $etd_ongkir = $data_cost_jne_arr[$keykon]['cost']['0']['etd'];
        $harga_ongkir =  $data_cost_jne_arr[$keykon]['cost']['0']['value'] * $jumlah_barang;
?>
        <div class="box_list_ongkir" onclick="UbahOpsiOngkir('<?php echo $kurir_ongkir; ?>', '<?php echo $keykon; ?>', '<?php echo $kurir_layanan_ongkir; ?>', '<?php echo $etd_ongkir; ?>', '<?php echo $harga_ongkir; ?>')">
            <div class="judul_list_ongkir">
                <h1><?php echo strtoupper($kurir_ongkir); ?> <?php echo $kurir_layanan_ongkir; ?></h1>
                <h5>Rp <?php echo number_format($harga_ongkir, 0, ".", "."); ?></h5>
            </div>
            <p>Perkiraan sampai <?php echo $etd_ongkir; ?> Hari</p>
        </div>
    <?php
    }
}

// TIKI
$curl_tiki = curl_init();
curl_setopt_array($curl_tiki, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=$kota_id_toko&destination=$kota_tujuan&weight=$berat_barang&courier=tiki",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: $rajaongkir_key"
    ),
));
$response_cost_tiki = curl_exec($curl_tiki);
$err_cost_tiki = curl_error($curl_tiki);
curl_close($curl_tiki);
if ($err_cost_tiki) {
    echo "cURL Error #:" . $err_cost_tiki;
} else {
    $data_cost_tiki = json_decode($response_cost_tiki, true);

    $data_cost_tiki_arr = $data_cost_tiki['rajaongkir']['results']['0']['costs'];
    foreach ($data_cost_tiki_arr as $keykon => $valuekon) {
        $kurir_ongkir = $data_cost_tiki['rajaongkir']['results']['0']['code'];
        $kurir_layanan_ongkir = $data_cost_tiki_arr[$keykon]['service'];
        $etd_ongkir = $data_cost_tiki_arr[$keykon]['cost']['0']['etd'];
        $harga_ongkir =  $data_cost_tiki_arr[$keykon]['cost']['0']['value'] * $jumlah_barang;
    ?>
        <div class="box_list_ongkir" onclick="UbahOpsiOngkir('<?php echo $kurir_ongkir; ?>', '<?php echo $keykon; ?>', '<?php echo $kurir_layanan_ongkir; ?>', '<?php echo $etd_ongkir; ?>', '<?php echo $harga_ongkir; ?>')">
            <div class="judul_list_ongkir">
                <h1><?php echo strtoupper($kurir_ongkir); ?> <?php echo $kurir_layanan_ongkir; ?></h1>
                <h5>Rp <?php echo number_format($harga_ongkir, 0, ".", "."); ?></h5>
            </div>
            <p>Perkiraan sampai <?php echo $etd_ongkir; ?> Hari</p>
        </div>
    <?php
    }
}

// POS
$curl_pos = curl_init();
curl_setopt_array($curl_pos, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=$kota_id_toko&destination=$kota_tujuan&weight=$berat_barang&courier=pos",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: $rajaongkir_key"
    ),
));
$response_cost_pos = curl_exec($curl_pos);
$err_cost_pos = curl_error($curl_pos);
curl_close($curl_pos);
if ($err_cost_pos) {
    echo "cURL Error #:" . $err_cost_pos;
} else {
    $data_cost_pos = json_decode($response_cost_pos, true);

    $data_cost_pos_arr = $data_cost_pos['rajaongkir']['results']['0']['costs'];
    foreach ($data_cost_pos_arr as $keykon => $valuekon) {
        $kurir_ongkir = $data_cost_pos['rajaongkir']['results']['0']['code'];
        $kurir_layanan_ongkir = $data_cost_pos_arr[$keykon]['service'];
        $etd_ongkir = $data_cost_pos_arr[$keykon]['cost']['0']['etd'];
        $harga_ongkir =  $data_cost_pos_arr[$keykon]['cost']['0']['value'] * $jumlah_barang;
    ?>
        <div class="box_list_ongkir" onclick="UbahOpsiOngkir('<?php echo $kurir_ongkir; ?>', '<?php echo $keykon; ?>', '<?php echo $kurir_layanan_ongkir; ?>', '<?php echo $etd_ongkir; ?>', '<?php echo $harga_ongkir; ?>')">
            <div class="judul_list_ongkir">
                <h1><?php echo strtoupper($kurir_ongkir); ?> <?php echo $kurir_layanan_ongkir; ?></h1>
                <h5>Rp <?php echo number_format($harga_ongkir, 0, ".", "."); ?></h5>
            </div>
            <p>Perkiraan sampai <?php echo $etd_ongkir; ?></p>
        </div>
<?php
    }
}
?>
<style>
    .box_list_ongkir {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid var(--border-grey);
        border-radius: 3px;
        padding: 10px 15px;
        cursor: pointer;
    }

    .judul_list_ongkir {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .judul_list_ongkir h1 {
        font-size: 15px;
        font-weight: 500;
        color: var(--black);
    }

    .judul_list_ongkir h5 {
        font-size: 15px;
        font-weight: 500;
        color: var(--orange);
    }

    .box_list_ongkir p {
        font-size: 12px;
        color: var(--semi-black);
        margin-top: 5px;
    }

    @media only screen and (max-width: 500px) {
        .judul_list_ongkir h1 {
            font-size: 13px;
        }

        .judul_list_ongkir h5 {
            font-size: 13px;
        }

        .box_list_ongkir p {
            font-size: 11px;
        }
    }
</style>