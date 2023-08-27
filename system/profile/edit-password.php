<?php
include '../../config.php';

$password_lama = $_POST['password_lama'];
$password_baru = password_hash($_POST['password_baru'], PASSWORD_DEFAULT);

$password_now_ep = $profile['password'];
if (password_verify($password_lama, $password_now_ep)) {
    $update_pass_ep = $server->query("UPDATE `akun` SET `password`='$password_baru' WHERE `id`='$iduser'");
?>
    <script>
        p_password_lama.style.color = '#959595';
        password_lama.style.border = '1px solid #e2e2e2';
        p_password_lama.innerHTML = 'Password Lama';
        edit_password.style.display = 'none';
        edit_password_berhasil.style.display = 'flex';
    </script>
<?php
} else {
?>
    <script>
        p_password_lama.style.color = '#EA2027';
        password_lama.style.border = '1px solid #EA2027';
        p_password_lama.innerHTML = 'Password Salah';
    </script>
<?php
}
