<?php
include '../../../config.php';

$time_fs_ub = $_POST['time_fs_ub'];
$up_time_fs_ub = strtotime($time_fs_ub);

$update_time_fs_adm = $server->query("UPDATE `flashsale` SET `waktu_berakhir`='$up_time_fs_ub' WHERE `id_fs`='1'");

if ($update_time_fs_adm) {
    ?>
    <script>
        window.location.href = 'index.php';
    </script>
    <?php
}
?>