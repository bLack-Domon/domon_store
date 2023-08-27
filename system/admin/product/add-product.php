<?php
include '../../../config.php';

$judul_tp = mysqli_real_escape_string($server, $_POST['judul_tp']);
$harga_tp = str_replace('.', '', $_POST['harga_tp']);
$kategori_tp = mysqli_real_escape_string($server, $_POST['kategori_tp']);
$berat_tp = str_replace('.', '', $_POST['berat_tp']);
$stok_tp = str_replace('.', '', $_POST['stok_tp']);
$deskripsi_tp = mysqli_real_escape_string($server, $_POST['deskripsi_tp']);
$varian_warna = substr($_POST['varian_warna'], 1);
$varian_ukuran = substr($_POST['varian_ukuran'], 1);

$time = date("Y-m-d H:i:s");

$img_name_random = round(microtime(true));

if (!empty($_FILES["c_img_tp_1"]["name"])) {
    $expname1 = explode('.', $_FILES["c_img_tp_1"]["name"]);
    $ext1 = end($expname1);
    $name1 = $img_name_random . '-1' . '.' . $ext1;
    $path1 = "../../../assets/image/product/" . $name1;
    move_uploaded_file($_FILES["c_img_tp_1"]["tmp_name"], $path1);
    $nametodb1 = $name1 . ',';
} else {
    $nametodb1 = '';
}
if (!empty($_FILES["c_img_tp_2"]["name"])) {
    $expname2 = explode('.', $_FILES["c_img_tp_2"]["name"]);
    $ext2 = end($expname2);
    $name2 = $img_name_random . '-2' . '.' . $ext2;
    $path2 = "../../../assets/image/product/" . $name2;
    move_uploaded_file($_FILES["c_img_tp_2"]["tmp_name"], $path2);
    $nametodb2 = $name2 . ',';
} else {
    $nametodb2 = '';
}
if (!empty($_FILES["c_img_tp_3"]["name"])) {
    $expname3 = explode('.', $_FILES["c_img_tp_3"]["name"]);
    $ext3 = end($expname3);
    $name3 = $img_name_random . '-3' . '.' . $ext3;
    $path3 = "../../../assets/image/product/" . $name3;
    move_uploaded_file($_FILES["c_img_tp_3"]["tmp_name"], $path3);
    $nametodb3 = $name3 . ',';
} else {
    $nametodb3 = '';
}
if (!empty($_FILES["c_img_tp_4"]["name"])) {
    $expname4 = explode('.', $_FILES["c_img_tp_4"]["name"]);
    $ext4 = end($expname4);
    $name4 = $img_name_random . '-4' . '.' . $ext4;
    $path4 = "../../../assets/image/product/" . $name4;
    move_uploaded_file($_FILES["c_img_tp_4"]["tmp_name"], $path4);
    $nametodb4 = $name4 . ',';
} else {
    $nametodb4 = '';
}
if (!empty($_FILES["c_img_tp_5"]["name"])) {
    $expname5 = explode('.', $_FILES["c_img_tp_5"]["name"]);
    $ext5 = end($expname5);
    $name5 = $img_name_random . '-5' . '.' . $ext5;
    $path5 = "../../../assets/image/product/" . $name5;
    move_uploaded_file($_FILES["c_img_tp_5"]["tmp_name"], $path5);
    $nametodb5 = $name5 . ',';
} else {
    $nametodb5 = '';
}
$name_gambar_add = $nametodb1 . $nametodb2 . $nametodb3 . $nametodb4 . $nametodb5;
$name_gambar = substr($name_gambar_add, 0, -1);

$insert_product_adm = $server->query("INSERT INTO `iklan`(`id_kategori`, `gambar`, `judul`, `harga`, `deskripsi`, `berat`, `warna`, `ukuran`, `stok`, `waktu`) VALUES ('$kategori_tp', '$name_gambar', '$judul_tp', '$harga_tp', '$deskripsi_tp', '$berat_tp', '$varian_warna', '$varian_ukuran', '$stok_tp', '$time')");

if ($insert_product_adm) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
