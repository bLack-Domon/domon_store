<?php
include '../../../config.php';
include '../../../system/email/class.phpmailer.php';
include '../../../system/email/send-email.php';

$idinvoicesb = $_POST['idinvoicesb'];
$resi_pengiriman_v = $_POST['resi_pengiriman_v'];
$time = date("Y-m-d H:i:s");

$select_invoice_ud = $server->query("SELECT * FROM `invoice` WHERE `idinvoice`='$idinvoicesb'");
$data_invoice_ud = mysqli_fetch_assoc($select_invoice_ud);
$iduser_ud = $data_invoice_ud['id_user'];

$update_dikirim = $server->query("UPDATE `invoice` SET `resi`='$resi_pengiriman_v', `tipe_progress`='Dikirim', `waktu_dikirim`='$time' WHERE `idinvoice`='$idinvoicesb' ");
$insert_notif_ud = $server->query("INSERT INTO `notification`(`id_user`, `id_invoice`, `nama_notif`, `deskripsi_notif`, `waktu_notif`) VALUES ('$iduser_ud', '$idinvoicesb', 'Pesanan Dikirim', 'Pesanan sudah dikirim oleh penjual dan sedang dalam perjalanan', '$time')");

// NOTIF EMAIL
$select_user_mp = $server->query("SELECT * FROM `invoice`, `iklan`, `akun` WHERE invoice.idinvoice='$idinvoicesb' AND invoice.id_iklan=iklan.id AND invoice.id_user=akun.id ");
$data_select_user_mp = mysqli_fetch_assoc($select_user_mp);

$email_user_mp = $data_select_user_mp['email'];
$nama_user_mp = $data_select_user_mp['nama_lengkap'];
$judul_barang_mp = $data_select_user_mp['judul'];
$kurir_mp = strtoupper($data_select_user_mp['kurir']);
$resi_mp = strtoupper($data_select_user_mp['resi']);

$judul_progress_produk = "Paket Dikirimkan ";
$deskripsi_email = "<div style='font-family: Arial, sans-serif; width: 100%; padding: 20px 30px; background-color: #f5f5f5; box-sizing: border-box;'>
<h1 style='font-size: 17px; font-weight: bold;'>Hi $nama_user_mp</h1>
<p style='font-size: 16px; margin-top: 10px;'>Produk <span style='font-weight: bold;'>$judul_barang_mp</span> Telah Dikirimkan Oleh Penjual.</p>
<p style='font-size: 16px; margin-top: 10px;'>Jasa Pengiriman: $kurir_mp</p>
<p style='font-size: 16px; margin-top: 5px;'>Nomor Resi: $resi_mp</p>
</div>";

EmailSend("$email_user_mp", "$judul_barang_mp", "$deskripsi_email", $judul_progress_produk, $server);