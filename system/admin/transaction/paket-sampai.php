<?php
include '../../../config.php';
include '../../../system/email/class.phpmailer.php';
include '../../../system/email/send-email.php';

$idinvoicesb = $_POST['idinvoice_pss'];
$time = date("Y-m-d H:i:s");

$select_invoice_ud = $server->query("SELECT * FROM `invoice` WHERE `idinvoice`='$idinvoicesb'");
$data_invoice_ud = mysqli_fetch_assoc($select_invoice_ud);
$iduser_ud = $data_invoice_ud['id_user'];

$update_dikirim = $server->query("UPDATE `invoice` SET `tipe_progress`='Selesai', `waktu_selesai`='$time' WHERE `idinvoice`='$idinvoicesb' ");
$insert_notif_ud = $server->query("INSERT INTO `notification`(`id_user`, `id_invoice`, `nama_notif`, `deskripsi_notif`, `waktu_notif`) VALUES ('$iduser_ud', '$idinvoicesb', 'Pesanan Telah Sampai', 'Pesanan sudah sampai ke tempat tujuan', '$time')");

// NOTIF EMAIL
$select_user_mp = $server->query("SELECT * FROM `invoice`, `iklan`, `akun` WHERE invoice.idinvoice='$idinvoicesb' AND invoice.id_iklan=iklan.id AND invoice.id_user=akun.id ");
$data_select_user_mp = mysqli_fetch_assoc($select_user_mp);

$email_user_mp = $data_select_user_mp['email'];
$nama_user_mp = $data_select_user_mp['nama_lengkap'];
$judul_barang_mp = $data_select_user_mp['judul'];

$judul_progress_produk = "Paket Sampai ";
$deskripsi_email = "<div style='font-family: Arial, sans-serif; width: 100%; padding: 20px 30px; background-color: #f5f5f5; box-sizing: border-box;'>
<h1 style='font-size: 17px; font-weight: bold;'>Hi $nama_user_mp</h1>
<p style='font-size: 16px; margin-top: 10px;'>Produk <span style='font-weight: bold;'>$judul_barang_mp</span> Telah Sampai Ke Tujuan.</p>
</div>";

EmailSend("$email_user_mp", "$judul_barang_mp", "$deskripsi_email", $judul_progress_produk, $server);