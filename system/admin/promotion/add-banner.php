<?php
include '../../../config.php';

$ext = end(explode('.', $_FILES["pilih_banner"]["name"]));
$name = md5(rand()) . '.' . $ext;
$path = "../../../assets/image/banner/" . $name;

if (move_uploaded_file($_FILES["pilih_banner"]["tmp_name"], $path)) {
    $insert_add_banner = $server->query("INSERT INTO `banner_promo`(`image`) VALUES ('$name')");
    if ($insert_add_banner) {
?>
        <script>
            window.location.href = 'index.php';
        </script>
<?php
    }
}