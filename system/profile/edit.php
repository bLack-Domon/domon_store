<?php
include '../../config.php';

$nama_lengkap = mysqli_real_escape_string($server, $_POST['nama_lengkap']);
$no_wa = mysqli_real_escape_string($server, $_POST['no_wa']);

$img_name_random = round(microtime(true));

function compress($source, $destination, $quality)
{
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
    } elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
    }
    imagejpeg($image, $destination, $quality);
    return $destination;
}

if (!empty($_FILES["cfile_img_pro"]["name"])) {
    $expname1 = explode('.', $_FILES["cfile_img_pro"]["name"]);
    $ext1 = end($expname1);
    $name1 = $img_name_random . '.' . $ext1;
    $path1 = "../../assets/image/profile/" . $name1;

    $source_img = $_FILES["cfile_img_pro"]["tmp_name"];
    $destination_img = $path1;

    $d = compress($source_img, $destination_img, 50);
} else {
    $name1 = $profile['foto'];
}
if ($profile['foto'] != 'user.png') {
    unlink('../../assets/image/profile/' . $profile['foto']);
}

$update_ep = $server->query("UPDATE `akun` SET `foto`='$name1',`nama_lengkap`='$nama_lengkap',`no_whatsapp`='$no_wa' WHERE `id`='$iduser'");

if ($update_ep) {
?>
    <script>
        window.location.href = 'user';
    </script>
<?php
}
