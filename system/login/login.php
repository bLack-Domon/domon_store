<?php
include '../../config.php';

$email = mysqli_real_escape_string($server, $_POST['email']);
$password = $_POST['password'];

$cek_akun = $server->query("SELECT * FROM `akun` WHERE `email`='$email' ");
$cek_akun_data = mysqli_fetch_assoc($cek_akun);

if ($cek_akun_data) {
    $pass_akun = $cek_akun_data['password'];
    if (password_verify($password, $pass_akun)) {
        // ENSKRIPSI ID
        $idakun = $cek_akun_data['id'] . "hcCTZvFLD7XIchiaMqEka0TLzGgdpsXB";
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = "ecommerce";
        $encryption = openssl_encrypt($idakun, $ciphering, $encryption_key, $options, $encryption_iv);
        $buat_cookie = setcookie("login", $encryption, time() + (86400 * 30), "/");
        if ($buat_cookie) {
?>
            <a href="<?php echo $url; ?>" id="sukses_login"></a>
            <script>
                sukses_login.click();
            </script>
        <?php
        }

        ?>
        <script>
            password.style.borderColor = '#e2e2e2';
            p_password.style.display = 'none';
            p_password.innerHTML = '';
        </script>
    <?php
    } else {
    ?>
        <script>
            password.style.borderColor = '#EA2027';
            p_password.style.display = 'block';
            p_password.innerHTML = 'Password Salah';
        </script>
    <?php
    }
    ?>
    <script>
        email.style.borderColor = '#e2e2e2';
        p_email.style.display = 'none';
        p_email.innerHTML = '';
    </script>
<?php
} else {
?>
    <script>
        email.style.borderColor = '#EA2027';
        p_email.style.display = 'block';
        p_email.innerHTML = 'Email Tidak Ditemukan';
    </script>
<?php
}

?>