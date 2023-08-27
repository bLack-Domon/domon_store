<?php
include '../../config.php';

$select_invoice = $server->query("SELECT * FROM `invoice`, `iklan`, `kategori` WHERE invoice.id_user='$iduser' AND invoice.tipe_progress='Belum Bayar' AND invoice.id_iklan=iklan.id AND iklan.id_kategori=kategori.id ORDER BY `invoice`.`idinvoice` DESC");
$cek_invoice = mysqli_num_rows($select_invoice);
if ($cek_invoice == "0") {
?>
    <div class="box_res_order_0">
        <img src="../assets/icons/list.svg" alt="">
        <p>Belum ada pesanan</p>
    </div>
<?php
} else {
?>
    <div class="box_isi_res_order">
        <?php
        while ($invoice_data = mysqli_fetch_assoc($select_invoice)) {
            $hitung_diskon_fs = ($invoice_data['diskon_i'] / 100) * $invoice_data['harga_i'];
            $harga_diskon_fs = ($invoice_data['harga_i'] - $hitung_diskon_fs) * $invoice_data['jumlah'];
            $harga_semua_fs = $harga_diskon_fs + $invoice_data['harga_ongkir'];
            $exp_gambar_od = explode(',', $invoice_data['gambar']);
        ?>
            <div class="isi_cart" id="isi_cart<?php echo $invoice_data['id']; ?>">
                <div class="box_gambar_judul">
                    <img src="<?php echo $url; ?>assets/image/product/<?php echo $exp_gambar_od[0]; ?>" alt="">
                    <div class="box_judul_ic">
                        <h1><?php echo $invoice_data['judul']; ?></h1>
                        <p>Kategori <span><?php echo $invoice_data['nama']; ?></span></p>
                        <p>Total Produk <span><?php echo $invoice_data['jumlah']; ?></span></p>
                    </div>
                </div>
                <div class="box_detail_isi_cart">
                    <div class="box_total_harga">
                        <p>Total Harga</p>
                        <h1><span>Rp</span> <?php echo number_format($harga_semua_fs, 0, ".", "."); ?></h1>
                    </div>
                    <a href="<?php echo $url; ?>checkout/detail/<?php echo $invoice_data['idinvoice']; ?>">
                        <div class="bayar" id="button_checkout<?php echo $invoice_data['id']; ?>">Bayar</div>
                    </a>
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
        padding: 170px 0;
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

    .box_isi_res_order {
        width: 100%;
        margin-top: 15px;
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
    }
</style>