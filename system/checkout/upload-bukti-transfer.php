<?php
include '../../config.php';
include '../../system/email/class.phpmailer.php';
include '../../system/email/send-email.php';

$time = date("Y-m-d H:i:s");
$id_inv_bt = $_POST['id_inv_bt'];
$nama_bank_bt = $_POST['nama_bank_bt'];

if (!empty($_FILES["inp_bukti_transfer"]["name"])) {
    $expname1 = explode('.', $_FILES["inp_bukti_transfer"]["name"]);
    $ext1 = end($expname1);
    $name1 = $id_inv_bt . '-bukti-transfer' . '.' . $ext1;
    $path1 = "../../assets/image/bukti-transfer/" . $name1;
    move_uploaded_file($_FILES["inp_bukti_transfer"]["tmp_name"], $path1);
}

$update_bt = $server->query("UPDATE `invoice` SET `bank_manual`='$nama_bank_bt',`bukti_transfer`='$name1',`waktu_transaksi`='$time' WHERE `idinvoice`='$id_inv_bt' ");

$select_user_mp = $server->query("SELECT * FROM `invoice`, `iklan`, `akun` WHERE invoice.idinvoice='$id_inv_bt' AND invoice.id_iklan=iklan.id AND invoice.id_user=akun.id ");
$data_select_user_mp = mysqli_fetch_assoc($select_user_mp);

$select_email_setting_n = $server->query("SELECT * FROM `setting_email` WHERE `id`='1' ");
$data_email_setting_n = mysqli_fetch_array($select_email_setting_n);
$email_admin_mp = $data_email_setting_n['email_notif'];

$email_user_mp = $data_select_user_mp['email'];
$nama_user_mp = $data_select_user_mp['nama_lengkap'];
$judul_barang_mp = $data_select_user_mp['judul'];

$judul_progress_produk = "$nama_user_mp Mengupload Bukti Transfer ";
$deskripsi_email_penjual = "<div style='font-family: Arial, sans-serif; width: 100%; padding: 20px 30px; background-color: #f5f5f5; box-sizing: border-box;'>
<h1 style='font-size: 17px; font-weight: bold;'>$nama_user_mp</h1>
<p style='font-size: 16px; margin-top: 10px;'>Telah Mengupload Bukti Transfer Untuk Pembayaran Produk <span style='font-weight: bold;'>$judul_barang_mp</span> Mohon Segera Dicek dan Dikonfirmasi Di Halaman Admin.</p>
</div>";

// NOTIF EMAIL PENJUAL
EmailSend("$email_admin_mp", "$judul_barang_mp", "$deskripsi_email_penjual", $judul_progress_produk, $server);

if ($update_bt) {
?>
    <script>
        window.location.href = '../../checkout/detail/<?php echo $id_inv_bt; ?>';
    </script>
<?php
}
