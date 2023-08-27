<?php
include '../../../config.php';

$id_produk_ep = $_POST['id_produk_ep'];
$judul_ep = mysqli_real_escape_string($server, $_POST['judul_ep']);
$harga_ep = str_replace('.', '', $_POST['harga_ep']);
$kategori_ep = mysqli_real_escape_string($server, $_POST['kategori_ep']);
$berat_ep = str_replace('.', '', $_POST['berat_ep']);
$stok_ep = str_replace('.', '', $_POST['stok_ep']);
$deskripsi_ep = mysqli_real_escape_string($server, $_POST['deskripsi_ep']);
$varian_warna = substr($_POST['varian_warna_ep'], 1);
$varian_ukuran = substr($_POST['varian_ukuran_ep'], 1);

$val_img_ed_ep1 = $_POST['val_img_ed_ep1'];
$val_img_ed_ep2 = $_POST['val_img_ed_ep2'];
$val_img_ed_ep3 = $_POST['val_img_ed_ep3'];
$val_img_ed_ep4 = $_POST['val_img_ed_ep4'];
$val_img_ed_ep5 = $_POST['val_img_ed_ep5'];

$img_name_random = round(microtime(true));

if ($val_img_ed_ep1 == '1') {
    $expname1 = explode('.', $_FILES["c_img_ep_1"]["name"]);
    $ext1 = end($expname1);
    $name1 = $img_name_random . '-1' . '.' . $ext1;
    $path1 = "../../../assets/image/product/" . $name1;
    move_uploaded_file($_FILES["c_img_ep_1"]["tmp_name"], $path1);
    $nametodb1 = $name1 . ',';
} else if ($val_img_ed_ep1 == '') {
    $nametodb1 = '';
} else {
    $nametodb1 = $val_img_ed_ep1 . ',';
}
if ($val_img_ed_ep2 == '1') {
    $expname2 = explode('.', $_FILES["c_img_ep_2"]["name"]);
    $ext2 = end($expname2);
    $name2 = $img_name_random . '-2' . '.' . $ext2;
    $path2 = "../../../assets/image/product/" . $name2;
    move_uploaded_file($_FILES["c_img_ep_2"]["tmp_name"], $path2);
    $nametodb2 = $name2 . ',';
} else if ($val_img_ed_ep2 == '') {
    $nametodb2 = '';
} else {
    $nametodb2 = $val_img_ed_ep2 . ',';
}
if ($val_img_ed_ep3 == '1') {
    $expname3 = explode('.', $_FILES["c_img_ep_3"]["name"]);
    $ext3 = end($expname3);
    $name3 = $img_name_random . '-3' . '.' . $ext3;
    $path3 = "../../../assets/image/product/" . $name3;
    move_uploaded_file($_FILES["c_img_ep_3"]["tmp_name"], $path3);
    $nametodb3 = $name3 . ',';
} else if ($val_img_ed_ep3 == '') {
    $nametodb3 = '';
} else {
    $nametodb3 = $val_img_ed_ep3 . ',';
}
if ($val_img_ed_ep4 == '1') {
    $expname4 = explode('.', $_FILES["c_img_ep_4"]["name"]);
    $ext4 = end($expname4);
    $name4 = $img_name_random . '-4' . '.' . $ext4;
    $path4 = "../../../assets/image/product/" . $name4;
    move_uploaded_file($_FILES["c_img_ep_4"]["tmp_name"], $path4);
    $nametodb4 = $name4 . ',';
} else if ($val_img_ed_ep4 == '') {
    $nametodb4 = '';
} else {
    $nametodb4 = $val_img_ed_ep4 . ',';
}
if ($val_img_ed_ep5 == '1') {
    $expname5 = explode('.', $_FILES["c_img_ep_5"]["name"]);
    $ext5 = end($expname5);
    $name5 = $img_name_random . '-5' . '.' . $ext5;
    $path5 = "../../../assets/image/product/" . $name5;
    move_uploaded_file($_FILES["c_img_ep_5"]["tmp_name"], $path5);
    $nametodb5 = $name5 . ',';
} else if ($val_img_ed_ep5 == '') {
    $nametodb5 = '';
} else {
    $nametodb5 = $val_img_ed_ep5 . ',';
}

$name_gambar_add = $nametodb1 . $nametodb2 . $nametodb3 . $nametodb4 . $nametodb5;
$name_gambar = substr($name_gambar_add, 0, -1);

$edit_produk_adm = $server->query("UPDATE `iklan` SET `id_kategori`='$kategori_ep',`gambar`='$name_gambar',`judul`='$judul_ep',`harga`='$harga_ep',`deskripsi`='$deskripsi_ep',`berat`='$berat_ep',`warna`='$varian_warna',`ukuran`='$varian_ukuran',`stok`='$stok_ep' WHERE `id`='$id_produk_ep' ");

if ($edit_produk_adm) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
