<?php
session_start();
if (isset($_COOKIE['login_admin'])) {
    unset($_COOKIE['login_admin']);
    setcookie('login_admin', $encryption, strtotime('-1 month'), '/');
    header("location: ../../admin/index.php");
}
