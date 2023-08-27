<option value="" selected disabled hidden>Pilih Kota</option>
<?php
include '../../config.php';

$exp_id_provinsi = explode(',', $_POST['id_provinsi']);
$id_provinsi = $exp_id_provinsi[0];

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
        "key: $rajaongkir_key"
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
        <option value="<?php echo $value_kota_data['city_id'] . ',' . $value_kota_data['city_name']; ?>"><?php echo $value_kota_data['city_name']; ?></option>
<?php
    }
}
?>