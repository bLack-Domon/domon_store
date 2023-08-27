<?php
include '../../../config.php';

$id_edit_banner = $_POST['id_edit_banner'];

$ext = end(explode('.', $_FILES["edit_banner_click"]["name"]));
$name = md5(rand()) . '.' . $ext;
$path = "../../../assets/image/banner/" . $name;

if (move_uploaded_file($_FILES["edit_banner_click"]["tmp_name"], $path)) {
    $update_edit_banner = $server->query("UPDATE `banner_promo` SET `image`='$name' WHERE `idbanner`='$id_edit_banner' ");
    if ($update_edit_banner) {
?>
        <script>
            window.location.href = 'index.php';
        </script>
<?php
    }
}