<?php
include '../../../config.php';
include '../../../system/email/class.phpmailer.php';
include '../../../system/email/send-email.php';

$idinvoice_pss = $_POST['idinvoice_pss'];
$id_usr_tm = $_POST['id_usr_tm'];
$time = date("Y-m-d H:i:s");
$tipe_progress = 'Dikemas';

$select_user_mp = $server->query("SELECT * FROM `invoice`, `iklan`, `akun` WHERE invoice.idinvoice='$idinvoice_pss' AND invoice.id_iklan=iklan.id AND invoice.id_user=akun.id ");
$data_select_user_mp = mysqli_fetch_assoc($select_user_mp);

$email_user_mp = $data_select_user_mp['email'];
$nama_user_mp = $data_select_user_mp['nama_lengkap'];
$judul_barang_mp = $data_select_user_mp['judul'];


$update_invoice = $server->query("UPDATE `invoice` SET `tipe_progress`='$tipe_progress' WHERE `idinvoice`='$idinvoice_pss'");
$insert_notif_payment = $server->query("INSERT INTO `notification`(`id_user`, `id_invoice`, `nama_notif`, `deskripsi_notif`, `waktu_notif`) VALUES ('$id_usr_tm', '$idinvoice_pss', 'Pembayaran Berhasil', 'Pembayaran pesanan sudah berhasil terverifikasi', '$time')");
$insert_notif_dikemas = $server->query("INSERT INTO `notification`(`id_user`, `id_invoice`, `nama_notif`, `deskripsi_notif`, `waktu_notif`) VALUES ('$id_usr_tm', '$idinvoice_pss', 'Pesanan Dikemas', 'Pesanan sedang dalam proses pengemasan oleh penjual', '$time')");

$judul_progress_produk = "Pembayaran Berhasil ";
$deskripsi_email = "<div style='font-family: Arial, sans-serif; width: 100%; padding: 20px 30px; background-color: #f5f5f5; box-sizing: border-box;'>
<h1 style='font-size: 17px; font-weight: bold;'>Hi $nama_user_mp</h1>
<p style='font-size: 16px; margin-top: 10px;'>Selamat Pembayaran Produk <span style='font-weight: bold;'>$judul_barang_mp</span> Telah Berhasil Di Verifikasi, Sekarang Sudah Masuk Dalam Proses Pengemasan Produk Oleh Penjual.</p>
</div>";

EmailSend("$email_user_mp", "$judul_barang_mp", "$deskripsi_email", $judul_progress_produk, $server);
