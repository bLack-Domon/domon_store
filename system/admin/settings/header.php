<?php
include '../../../config.php';

$nama_perusahaan_hs = mysqli_real_escape_string($server, $_POST['nama_perusahaan_hs']);
$placeh_search_hs = mysqli_real_escape_string($server, $_POST['placeh_search_hs']);

if (!empty($_FILES["ubah_logo_cf_hs"]["name"])) {
    unlink('../../../assets/icons/' . $logo);
    $expname1 = explode('.', $_FILES["ubah_logo_cf_hs"]["name"]);
    $ext1 = end($expname1);
    $name1 = 'logo' . '.' . $ext1;
    $path1 = "../../../assets/icons/" . $name1;
    move_uploaded_file($_FILES["ubah_logo_cf_hs"]["tmp_name"], $path1);
    $nametodb1 = $name1;
} else {
    $nametodb1 = $logo;
}

$update_header_setting = $server->query("UPDATE `setting_header` SET `logo`='$nametodb1',`title_name`='$nama_perusahaan_hs',`placeholder_search`='$placeh_search_hs' WHERE `id_hs`='1'");

if ($update_header_setting) {
?>
    <script>
        text_s_hs.innerHTML = 'Berhasil Disimpan';
        setTimeout(() => {
            text_s_hs.innerHTML = 'Simpan';
        }, 2000);
    </script>
<?php
}
