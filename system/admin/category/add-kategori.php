<?php
include '../../../config.php';

$ext = end(explode('.', $_FILES["icon_file"]["name"]));
$name = md5(rand()) . '.' . $ext;
$path = "../../../assets/icons/category/" . $name;

$nama_kategori = $_POST['nama_kategori'];

if (move_uploaded_file($_FILES["icon_file"]["tmp_name"], $path)) {
    $insert_add_kategori = $server->query("INSERT INTO `kategori`(`nama`, `icon`) VALUES ('$nama_kategori', '$name')");
    if ($insert_add_kategori) {
?>
        <script>
            window.location.href = 'index.php';
        </script>
<?php
    }
}
