<?php
include '../../../config.php';

$link_social_fo1 = mysqli_real_escape_string($server, $_POST['link_social_fo1']);
$link_social_fo2 = mysqli_real_escape_string($server, $_POST['link_social_fo2']);
$link_social_fo3 = mysqli_real_escape_string($server, $_POST['link_social_fo3']);
$link_social_fo4 = mysqli_real_escape_string($server, $_POST['link_social_fo4']);
$link_social_fo5 = mysqli_real_escape_string($server, $_POST['link_social_fo5']);
$link_social_fo6 = mysqli_real_escape_string($server, $_POST['link_social_fo6']);

$update_ls1 = $server->query("UPDATE `setting_footer` SET `link_social`='$link_social_fo1' WHERE `id_fo`='1' ");
$update_ls2 = $server->query("UPDATE `setting_footer` SET `link_social`='$link_social_fo2' WHERE `id_fo`='2' ");
$update_ls3 = $server->query("UPDATE `setting_footer` SET `link_social`='$link_social_fo3' WHERE `id_fo`='3' ");
$update_ls4 = $server->query("UPDATE `setting_footer` SET `link_social`='$link_social_fo4' WHERE `id_fo`='4' ");
$update_ls5 = $server->query("UPDATE `setting_footer` SET `link_social`='$link_social_fo5' WHERE `id_fo`='5' ");
$update_ls6 = $server->query("UPDATE `setting_footer` SET `link_social`='$link_social_fo6' WHERE `id_fo`='6' ");

?>

<script>
    text_s_fo.innerHTML = 'Berhasil Disimpan';
    setTimeout(() => {
        text_s_fo.innerHTML = 'Simpan';
    }, 2000);
</script>