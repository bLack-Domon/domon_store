<?php
include '../../../config.php';
include '../../../system/email/class.phpmailer.php';
include '../../../system/email/send-email.php';
require_once '../../../assets/composer/midtrans-php-master/Midtrans.php';

\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$serverKey = $midtrans_server_key;
$notif = new \Midtrans\Notification();

$transaction = $notif->transaction_status;
$type = $notif->payment_type;
$order_id = $notif->order_id;
$fraud = $notif->fraud_status;

$exp_order_id = explode('-midtrans-', $order_id);
$id_invoice = $exp_order_id[0];
$tipe_progress = 'Dikemas';
$time = date("Y-m-d H:i:s");

$select_invoice_payment = $server->query("SELECT * FROM `invoice` WHERE `idinvoice`='$id_invoice'");
$data_invoice_payment = mysqli_fetch_assoc($select_invoice_payment);

$iduser_payment = $data_invoice_payment['id_user'];

$select_user_mp = $server->query("SELECT * FROM `invoice`, `iklan`, `akun` WHERE invoice.idinvoice='$id_invoice' AND invoice.id_iklan=iklan.id AND invoice.id_user=akun.id ");
$data_select_user_mp = mysqli_fetch_assoc($select_user_mp);

$select_email_setting_n = $server->query("SELECT * FROM `setting_email` WHERE `id`='1' ");
$data_email_setting_n = mysqli_fetch_array($select_email_setting_n);
$email_admin_mp = $data_email_setting_n['email_notif'];

$email_user_mp = $data_select_user_mp['email'];
$nama_user_mp = $data_select_user_mp['nama_lengkap'];
$judul_barang_mp = $data_select_user_mp['judul'];

$judul_progress_produk = "Pembayaran Berhasil ";
$deskripsi_email = "<div style='font-family: Arial, sans-serif; width: 100%; padding: 20px 30px; background-color: #f5f5f5; box-sizing: border-box;'>
<h1 style='font-size: 17px; font-weight: bold;'>Hi $nama_user_mp</h1>
<p style='font-size: 16px; margin-top: 10px;'>Selamat Pembayaran Produk <span style='font-weight: bold;'>$judul_barang_mp</span> Telah Berhasil Di Verifikasi, Sekarang Sudah Masuk Dalam Proses Pengemasan Produk Oleh Penjual.</p>
</div>";
$deskripsi_email_penjual = "<div style='font-family: Arial, sans-serif; width: 100%; padding: 20px 30px; background-color: #f5f5f5; box-sizing: border-box;'>
<h1 style='font-size: 17px; font-weight: bold;'>$nama_user_mp</h1>
<p style='font-size: 16px; margin-top: 10px;'>Telah Berhasil Melunasi Produk <span style='font-weight: bold;'>$judul_barang_mp</span> Telah Berhasil Di Verifikasi, Mohon Untuk Segera Update Progress Pemesanan Di Halaman Admin Setelah Barang Dalam Proses Pengiriman.</p>
</div>";

// NOTIF EMAIL PEMBELI
EmailSend("$email_user_mp", "$judul_barang_mp", "$deskripsi_email", $judul_progress_produk, $server);
// NOTIF EMAIL PENJUAL
EmailSend("$email_admin_mp", "$judul_barang_mp", "$deskripsi_email_penjual", $judul_progress_produk, $server);

if ($transaction == 'settlement') {
    $update_invoice = $server->query("UPDATE `invoice` SET `tipe_progress`='$tipe_progress',`transaction`='$transaction',`type`='$type',`order_id`='$order_id',`fraud`='$fraud',`waktu_transaksi`='$time' WHERE `idinvoice`='$id_invoice'");
    $insert_notif_payment = $server->query("INSERT INTO `notification`(`id_user`, `id_invoice`, `nama_notif`, `deskripsi_notif`, `waktu_notif`) VALUES ('$iduser_payment', '$id_invoice', 'Pembayaran Berhasil', 'Pembayaran pesanan sudah berhasil terverifikasi', '$time')");
    $insert_notif_dikemas = $server->query("INSERT INTO `notification`(`id_user`, `id_invoice`, `nama_notif`, `deskripsi_notif`, `waktu_notif`) VALUES ('$iduser_payment', '$id_invoice', 'Pesanan Dikemas', 'Pesanan sedang dalam proses pengemasan oleh penjual', '$time')");
} else {
    $update_invoice = $server->query("UPDATE `invoice` SET `transaction`='$transaction',`type`='$type',`order_id`='$order_id',`fraud`='$fraud',`waktu_transaksi`='$time' WHERE `idinvoice`='$id_invoice'");
}
