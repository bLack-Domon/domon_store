<?php
include '../config.php';

$page = 'NOTIFIKASI';

$update_status_notification = $server->query("UPDATE `notification` SET `status_notif`='Read' WHERE `id_user`='$iduser' ");

$select_notification = $server->query("SELECT * FROM `notification`, `invoice`, `iklan` WHERE notification.id_user='$iduser' AND notification.id_invoice=invoice.idinvoice AND invoice.id_iklan=iklan.id ORDER BY `notification`.`id_notif` DESC");
$jumlah_notification = mysqli_num_rows($select_notification);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi</title>
    <link rel="icon" href="../assets/icons/<?php echo $logo; ?>" type="image/svg">
    <link rel="stylesheet" href="../assets/css/notification/index.css">
</head>

<body>
    <!-- HEADER -->
    <?php include '../partials/header.php'; ?>
    <!-- HEADER -->

    <!-- CONTENT -->
    <div class="width">
        <div class="notification">
            <div class="head_notification">
                <h1>Notifikasi</h1>
                <p><?php echo $jumlah_notification; ?></p>
            </div>
            <?php
            if ($jumlah_notification != '0') {
            ?>
                <div class="isi_notification">
                    <?php
                    while ($data_notifikasi = mysqli_fetch_assoc($select_notification)) {
                        $exp_gambar_notif = explode(',', $data_notifikasi['gambar']);
                    ?>
                        <div class="box_isi_notification">
                            <img src="../assets/image/product/<?php echo $exp_gambar_notif[0]; ?>">
                            <div class="text_box_isi_notification">
                                <h3><?php echo $data_notifikasi['nama_notif']; ?></h3>
                                <h4><?php echo $data_notifikasi['deskripsi_notif'] ?></h4>
                                <p><?php echo $data_notifikasi['waktu_notif'] ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            } else {
            ?>
                <div class="isi_notification0">
                    <img src="../assets/icons/notification.svg">
                    <p>Belum ada notifikasi</p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- CONTENT -->

    <!-- FOOTER -->
    <?php include '../partials/footer.php'; ?>
    <!-- FOOTER -->

    <!-- FOOTER -->
    <?php include '../partials/bottom-navigation.php'; ?>
    <!-- FOOTER -->
</body>

</html>