<?php
include '../../config.php';

$nama_lengkap = mysqli_real_escape_string($server, $_POST['nama_lengkap']);
$email = mysqli_real_escape_string($server, $_POST['email']);
$no_whatsapp = mysqli_real_escape_string($server, $_POST['no_whatsapp']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$time = date("Y-m-d H:i:s");

// CEK EMAIL
$cek_email = $server->query("SELECT * FROM `akun` WHERE `email`='$email' ");
$cek_email_data = mysqli_fetch_assoc($cek_email);

if ($cek_email_data) {
?>
    <script>
        email.style.borderColor = '#EA2027';
        p_email.style.display = 'block';
        p_email.innerHTML = 'Email Sudah Terdaftar';
    </script>
    <?php
} else {
    $insert_akun = $server->query("INSERT INTO `akun`(`foto`, `nama_lengkap`, `email`, `no_whatsapp`, `password`, `waktu`) VALUES ('user.png', '$nama_lengkap', '$email', '$no_whatsapp', '$password', '$time')");
    if ($insert_akun) {
        $select_akun = $server->query("SELECT * FROM `akun` WHERE `email`='$email' AND `password`='$password' ");
        $select_akun_data = mysqli_fetch_assoc($select_akun);
        // ENSKRIPSI ID
        $idakun = $select_akun_data['id'] . "hcCTZvFLD7XIchiaMqEka0TLzGgdpsXB";
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = "ecommerce";
        $encryption = openssl_encrypt($idakun, $ciphering, $encryption_key, $options, $encryption_iv);
        $buat_cookie = setcookie("login", $encryption, time() + (86400 * 30), "/");
        if ($buat_cookie) {
    ?>
            <a href="<?php echo $url; ?>" id="sukses_register"></a>
            <script>
                sukses_register.click();
            </script>
    <?php
        }
    }
    ?>
    <script>
        email.style.borderColor = '#e2e2e2';
        p_email.style.display = 'none';
        p_email.innerHTML = '';
    </script>
<?php
}

?>