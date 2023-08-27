<?php
include '../../config.php';

$star_bp_inp = mysqli_real_escape_string($server, $_POST['star_bp_inp']);
$deskripsi_bp_inp = mysqli_real_escape_string($server, $_POST['deskripsi_bp_inp']);
$id_inv_bp = mysqli_real_escape_string($server, $_POST['id_inv_bp']);

$insert_rating = $server->query("INSERT INTO `rating`(`id_invoice_rat`, `star_rat`, `deskripsi_rat`) VALUES ('$id_inv_bp', '$star_bp_inp', '$deskripsi_bp_inp')");
if ($insert_rating) {
?>
    <script>
        box_bp_produk.style.display = 'none';
        id_inv_bp.value = '';
        star_c1.style.color = '#e2e2e2';
        star_c2.style.color = '#e2e2e2';
        star_c3.style.color = '#e2e2e2';
        star_c4.style.color = '#e2e2e2';
        star_c5.style.color = '#e2e2e2';
        star_bp_inp.value = '';
        var hid_bu_snilai = 'bu_snilai' + <?php echo $id_inv_bp; ?>;
        var hid_snilai = 'snilai' + <?php echo $id_inv_bp; ?>;
        document.getElementById(hid_bu_snilai).style.display = 'none';
        document.getElementById(hid_snilai).style.display = 'block';
    </script>
<?php
}
?>