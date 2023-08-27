<?php
include '../../../config.php';

$inp_tipe_mp = $_POST['inp_tipe_mp'];
$nama_bank = $_POST['nama_bank'];
$norek = $_POST['norek'];
$atas_nama = $_POST['atas_nama'];

$update_mp_adm = $server->query("UPDATE `setting_pembayaran` SET `status`='' ");
$update_mp_adm = $server->query("UPDATE `setting_pembayaran` SET `status`='active' WHERE `tipe`='$inp_tipe_mp' ");

$update_norek_adm = $server->query("UPDATE `nomor_rekening` SET `nama_bank`='$nama_bank',`norek`='$norek',`an`='$atas_nama' WHERE `idnorek`='1' ");

if ($update_norek_adm) {
?>
    <script>
        text_s_lmp.innerHTML = 'Berhasil Disimpan';
        setTimeout(() => {
            text_s_lmp.innerHTML = 'Simpan';
        }, 3000);
    </script>
<?php
}
