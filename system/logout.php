<?php
session_start();
if (isset($_COOKIE['login'])) {
    unset($_COOKIE['login']);
    setcookie('login', $encryption, strtotime('-1 month'), '/');
    header("location: ../index.php");
}
