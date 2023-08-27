<option value="" selected disabled hidden>Pilih Kota</option>
<?php

$id_provinsi = $_POST['id_provinsi'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$id_provinsi",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: b4b098e01ae450258339de08ad504256"
    ),
));

$res_kota = curl_exec($curl);
$err_kota = curl_error($curl);

curl_close($curl);

if ($err_kota) {
    echo "cURL Error #:" . $err_kota;
} else {
    $kota_data_arr = json_decode($res_kota, true);
    $kota_data = $kota_data_arr['rajaongkir']['results'];
    foreach ($kota_data as $key_kota_data => $value_kota_data) {
?>
        <option value="<?php echo $value_kota_data['city_id']; ?>"><?php echo $value_kota_data['city_name']; ?></option>
<?php
    }
}
?>