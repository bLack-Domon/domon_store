<?php

function EmailSend($email_user_mp, $judul_barang_mp, $deskripsi_email, $judul_progress_produk, $server)
{
    $select_email_setting = $server->query("SELECT * FROM `setting_email` WHERE `id`='1' ");
    $data_email_setting = mysqli_fetch_array($select_email_setting);

    $host_e_smtp = $data_email_setting['host_smtp'];
    $port_e_smtp = $data_email_setting['port_smtp'];
    $username_e_smtp = $data_email_setting['username_smtp'];
    $password_e_smtp = $data_email_setting['password_smtp'];
    $setfrom_e_smtp = $data_email_setting['setfrom_smtp'];

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "$host_e_smtp"; //host masing2 provider email
    $mail->SMTPDebug = 2;
    $mail->Port = $port_e_smtp;
    $mail->SMTPAuth = true;
    $mail->Username = "$username_e_smtp"; //user email
    $mail->Password = "$password_e_smtp"; //password email 
    $mail->SetFrom("$setfrom_e_smtp", "$setfrom_e_smtp"); //set email pengirim
    $mail->Subject = $judul_progress_produk . "$judul_barang_mp"; //subyek email
    $mail->AddAddress($email_user_mp);  //tujuan email
    $mail->MsgHTML("$deskripsi_email");
    $mail->Send();
}
