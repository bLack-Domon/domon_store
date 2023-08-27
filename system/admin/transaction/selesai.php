<?php
include '../../../config.php';

$select_invoice = $server->query("SELECT * FROM `iklan`, `kategori`, `akun`, `invoice` WHERE  invoice.tipe_progress='Selesai' AND invoice.id_iklan=iklan.id AND iklan.id_kategori=kategori.id AND invoice.id_user=akun.id ORDER BY `invoice`.`idinvoice` DESC");
$cek_invoice = mysqli_num_rows($select_invoice);
if ($cek_invoice == "0") {
?>
    <div class="box_res_order_0">
        <img src="<?php echo $url; ?>assets/icons/list.svg" alt="">
        <p>Belum ada pesanan</p>
    </div>
<?php
} else {
?>
    <div class="jumlah_isi_res_order">
        <h1>Total Selesai</h1>
        <p><?php echo $cek_invoice; ?> Produk</p>
    </div>
    <div class="box_isi_res_order">
        <?php
        while ($invoice_data = mysqli_fetch_assoc($select_invoice)) {
            $hitung_diskon_fs = ($invoice_data['diskon_i'] / 100) * $invoice_data['harga_i'];
            $harga_diskon_fs = ($invoice_data['harga_i'] - $hitung_diskon_fs) * $invoice_data['jumlah'];
            $harga_semua_fs = $harga_diskon_fs + $invoice_data['harga_ongkir'];
            $exp_gambar_od = explode(',', $invoice_data['gambar']);
            $exp_prov_od = explode(',', $invoice_data['provinsi']);
            $exp_kota_od = explode(',', $invoice_data['kota']);
        ?>
            <div class="isi_cart" id="isi_cart<?php echo $invoice_data['id']; ?>">
                <div class="box_gambar_judul" onclick="show_detail_invoice('<?php echo $url; ?>assets/image/product/<?php echo $exp_gambar_od[0]; ?>', `<?php echo $invoice_data['judul']; ?>`, '<?php echo $invoice_data['nama']; ?>', '<?php echo $invoice_data['jumlah']; ?>', '#<?php echo $invoice_data['idinvoice']; ?>', '<?php echo $invoice_data['tipe_progress']; ?>', 'Sudah Dibayar', '<?php echo $invoice_data['nama_lengkap']; ?>', '<?php echo $exp_prov_od[1] . ', ' . $exp_kota_od[1] . ', ' . $invoice_data['alamat_lengkap']; ?>', '<?php echo strtoupper($invoice_data['kurir']) . ' ' . $invoice_data['layanan_kurir']; ?>', 'Rp <?php echo number_format($harga_semua_fs, 0, '.', '.'); ?>', '<?php echo $url . 'admin/transaction/print/invoice/' . $invoice_data['idinvoice']; ?>')">
                    <img src="<?php echo $url; ?>assets/image/product/<?php echo $exp_gambar_od[0]; ?>" alt="">
                    <div class="box_judul_ic">
                        <h1><?php echo $invoice_data['judul']; ?></h1>
                        <p>Kategori <span><?php echo $invoice_data['nama']; ?></span></p>
                        <p>Total Produk <span><?php echo $invoice_data['jumlah']; ?></span></p>
                        <p><?php echo $exp_prov_od[1] . ', ' . $exp_kota_od[1] . ', ' . $invoice_data['alamat_lengkap']; ?></p>
                    </div>
                </div>
                <div class="box_detail_isi_cart">
                    <div class="box_total_harga">
                        <div class="box_profile_isi_cart">
                            <p><?php echo $invoice_data['nama_lengkap']; ?></p>
                            <img src="<?php echo $url; ?>assets/image/profile/<?php echo $invoice_data['foto']; ?>">
                        </div>
                        <p><?php echo $invoice_data['waktu']; ?></p>
                        <h1><span>Rp</span> <?php echo number_format($harga_semua_fs, 0, ".", "."); ?></h1>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<style>
    .box_res_order_0 {
        width: 100%;
        background-color: var(--white);
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 150px 0;
    }

    .box_res_order_0 img {
        height: 80px;
    }

    .box_res_order_0 p {
        font-size: 15px;
        font-weight: 500;
        text-align: center;
        color: var(--semi-black);
        margin-top: 15px;
    }

    .jumlah_isi_res_order {
        width: 100%;
        padding: 15px 20px;
        background-color: var(--white);
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        box-sizing: border-box;
        align-items: center;
    }

    .jumlah_isi_res_order h1 {
        font-size: 15px;
        font-weight: 500;
    }

    .jumlah_isi_res_order p {
        font-size: 15px;
        font-weight: 500;
    }

    .box_isi_res_order {
        width: 100%;
        margin-top: 10px;
        display: grid;
        grid-template-columns: 1fr;
        grid-gap: 5px;
    }

    .isi_cart {
        width: 100%;
        padding: 15px 20px;
        background-color: var(--white);
        box-sizing: border-box;
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .box_gambar_judul {
        width: 450px;
        overflow: hidden;
        float: left;
        cursor: pointer;
    }

    .isi_cart img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 3px;
        float: left;
    }

    .box_judul_ic {
        width: calc(100% - 95px);
        float: right;
    }

    .box_judul_ic h1 {
        font-size: 15px;
        font-weight: 500;
        color: var(--black);
        margin-bottom: 8px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .box_judul_ic p {
        font-size: 13px;
        font-weight: 500;
        color: var(--grey);
        margin-top: 3px;
    }

    .box_judul_ic p span {
        color: var(--orange);
    }

    .box_detail_isi_cart {
        width: calc(100% - 450px);
        float: right;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-end;
    }

    .box_total_harga {
        margin-left: 20px;
        text-align: right;
    }

    .box_total_harga p {
        font-size: 13px;
        font-weight: 500;
        color: var(--grey);
        margin-top: 3px;
    }

    .box_total_harga h1 {
        font-size: 18px;
        font-weight: 600;
        color: var(--orange);
        margin-top: 3px;
    }

    .box_total_harga h1 span {
        font-size: 14px;
    }

    .bayar {
        background-color: var(--orange);
        color: var(--white);
        border-radius: 3px;
        height: 45px;
        font-weight: 500;
        font-size: 16px;
        margin-left: 20px;
        width: 120px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .bayar img {
        width: 20px;
        height: 20px;
    }

    .loading_checkout {
        display: none;
    }

    .box_profile_isi_cart {
        display: flex;
        flex-direction: row;
        align-items: center;
        margin-bottom: 10px;
    }

    .box_profile_isi_cart img {
        width: 22px;
        height: 22px;
        border-radius: 22px;
        object-fit: cover;
    }

    .box_profile_isi_cart p {
        margin-right: 10px;
        color: var(--semi-black);
        font-weight: 500;
    }

    @media only screen and (max-width: 900px) {
        .isi_cart {
            display: block;
            padding: 15px;
        }

        .box_gambar_judul {
            width: 100%;
            /* background-color: red; */
        }

        .isi_cart img {
            width: 65px;
            height: 65px;
        }

        .box_judul_ic {
            width: calc(100% - 80px);
            float: right;
            /* background-color: blue; */
        }

        .box_judul_ic h1 {
            font-size: 13px;
        }

        .box_judul_ic p {
            font-size: 11.5px;
        }

        .box_detail_isi_cart {
            width: 100%;
            /* background-color: blue; */
            margin-top: 15px;
            padding-top: 13px;
            border-top: 1px solid var(--border-grey);
            justify-content: flex-start;
        }

        .box_total_harga {
            flex: 1;
            margin-left: 0;
            text-align: left;
            /* background-color: red; */
        }

        .box_total_harga p {
            font-size: 11px;
            font-weight: 500;
            color: var(--grey);
            margin-top: 0px;
        }

        .box_total_harga h1 {
            font-size: 14px;
            font-weight: 600;
            color: var(--orange);
            margin-top: 3px;
        }

        .box_total_harga h1 span {
            font-size: 12px;
        }

        .box_remove_cart {
            margin-left: 15px;
        }

        .bayar {
            width: 105px;
            height: 38px;
            font-size: 14px;
            font-weight: 600;
        }

        .bayar img {
            width: 15px;
            height: 15px;
        }

        .box_profile_isi_cart {
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .box_profile_isi_cart img {
            width: 22px;
            height: 22px;
            border-radius: 22px;
            object-fit: cover;
        }

        .box_profile_isi_cart p {
            margin-left: 10px;
        }
    }
</style>