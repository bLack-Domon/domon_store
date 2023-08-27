<?php
include '../../../config.php';

$nama_kategori_edit = $_POST['nama_kategori_edit'];
$val_id_kat_hapus = $_POST['val_id_kat_hapus'];

if (empty($_FILES["icon_file_edit"]["name"])) {
    $update_kategori = $server->query("UPDATE `kategori` SET `nama`='$nama_kategori_edit' WHERE `id`='$val_id_kat_hapus'");
    if ($update_kategori) {
?>
        <script>
            window.location.href = 'index.php';
        </script>
        <?php
    }
} else {
    $ext = end(explode('.', $_FILES["icon_file_edit"]["name"]));
    $name = md5(rand()) . '.' . $ext;
    $path = "../../../assets/icons/category/" . $name;

    if (move_uploaded_file($_FILES["icon_file_edit"]["tmp_name"], $path)) {
        $update_kategori = $server->query("UPDATE `kategori` SET `nama`='$nama_kategori_edit', `icon`='$name' WHERE `id`='$val_id_kat_hapus'");
        if ($update_kategori) {
        ?>
            <script>
                window.location.href = 'index.php';
            </script>
<?php
        }
    }
}
