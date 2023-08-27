window.onload = function () {
    belum_bayar.click();
}

function req_list_transaksi(url_list_transaksi) {
    var data_list_transaksi = new FormData();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            loading_res_transaksi_admin.style.display = 'block';
            res_transaksi_admin.style.display = 'none';
        }
        if (this.readyState == 4 && this.status == 200) {
            loading_res_transaksi_admin.style.display = 'none';
            res_transaksi_admin.style.display = 'block';
            document.getElementById('res_transaksi_admin').innerHTML = this.responseText;
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', url_list_transaksi, true);
    xhttp.send(data_list_transaksi);
}

belum_bayar.onclick = function () {
    belum_bayar.className = 'isi_list_transaksi_admin_active';
    sudah_bayar.className = 'isi_list_transaksi_admin';
    dalam_perjalanan.className = 'isi_list_transaksi_admin';
    selesai.className = 'isi_list_transaksi_admin';
    dibatalkan.className = 'isi_list_transaksi_admin';
    url_lt = '../../system/admin/transaction/belum-bayar.php';
    req_list_transaksi(url_lt);
}

sudah_bayar.onclick = function () {
    belum_bayar.className = 'isi_list_transaksi_admin';
    sudah_bayar.className = 'isi_list_transaksi_admin_active';
    dalam_perjalanan.className = 'isi_list_transaksi_admin';
    selesai.className = 'isi_list_transaksi_admin';
    dibatalkan.className = 'isi_list_transaksi_admin';
    url_lt = '../../system/admin/transaction/sudah-bayar.php';
    req_list_transaksi(url_lt);
}

dalam_perjalanan.onclick = function () {
    belum_bayar.className = 'isi_list_transaksi_admin';
    sudah_bayar.className = 'isi_list_transaksi_admin';
    dalam_perjalanan.className = 'isi_list_transaksi_admin_active';
    selesai.className = 'isi_list_transaksi_admin';
    dibatalkan.className = 'isi_list_transaksi_admin';
    url_lt = '../../system/admin/transaction/dalam-perjalanan.php';
    req_list_transaksi(url_lt);
}

selesai.onclick = function () {
    belum_bayar.className = 'isi_list_transaksi_admin';
    sudah_bayar.className = 'isi_list_transaksi_admin';
    dalam_perjalanan.className = 'isi_list_transaksi_admin';
    selesai.className = 'isi_list_transaksi_admin_active';
    dibatalkan.className = 'isi_list_transaksi_admin';
    url_lt = '../../system/admin/transaction/selesai.php';
    req_list_transaksi(url_lt);
}

dibatalkan.onclick = function () {
    belum_bayar.className = 'isi_list_transaksi_admin';
    sudah_bayar.className = 'isi_list_transaksi_admin';
    dalam_perjalanan.className = 'isi_list_transaksi_admin';
    selesai.className = 'isi_list_transaksi_admin';
    dibatalkan.className = 'isi_list_transaksi_admin_active';
    url_lt = '../../system/admin/transaction/dibatalkan.php';
    req_list_transaksi(url_lt);
}

function step_dikirim() {
    var idinvoicesb_v = document.getElementById('idinvoice_pss').value;
    var list_sdk_add = 'list_sdk' + idinvoicesb_v;
    var text_sdk_add = 'text_sdk' + idinvoicesb_v;
    var load_sdk_add = 'load_sdk' + idinvoicesb_v;
    var data_update_dikirim = new FormData();
    data_update_dikirim.append('idinvoicesb', idinvoicesb_v);
    data_update_dikirim.append('resi_pengiriman_v', document.getElementById('resi_pengiriman_v').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            document.getElementById(text_sdk_add).style.display = 'none';
            document.getElementById(load_sdk_add).style.display = 'block';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(list_sdk_add).style.display = 'none';
            url_lt = '../../system/admin/transaction/sudah-bayar.php';
            req_list_transaksi(url_lt);
            idinvoice_pss.value = '';
            resi_pengiriman_v.value = '';
            // document.getElementById('res_transaksi_admin').innerHTML = this.responseText;
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', '../../system/admin/transaction/update-dikirim.php', true);
    xhttp.send(data_update_dikirim);
}

function step_paket_sampai(idinvoice_pss) {
    var list_pss_add = 'isi_cart_kajgf' + idinvoice_pss;
    var text_pss_add = 'text_sdk' + idinvoice_pss;
    var load_pss_add = 'load_sdk' + idinvoice_pss;
    var data_update_paket_sampai = new FormData();
    data_update_paket_sampai.append('idinvoice_pss', idinvoice_pss);
    data_update_paket_sampai.append('resi_pengiriman_v', document.getElementById('resi_pengiriman_v').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            document.getElementById(text_pss_add).style.display = 'none';
            document.getElementById(load_pss_add).style.display = 'block';
        }
        if (this.readyState == 4 && this.status == 200) {
            url_lt = '../../system/admin/transaction/dalam-perjalanan.php';
            req_list_transaksi(url_lt);
            // document.getElementById('res_transaksi_admin').innerHTML = this.responseText;
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', '../../system/admin/transaction/paket-sampai.php', true);
    xhttp.send(data_update_paket_sampai);
}

function show_detail_invoice(img_produk_vd_iv, judul_produk_vd_iv, kategori_vd_iv, kuantitas_vd_iv, id_pesanan_vd_iv, status_pesanan_vd_iv, status_pembayaran_vd_iv, nama_pembeli_vd_iv, alamat_pembeli_vd_iv, kurir_pengiriman_vd_iv, total_pembayaran_vd_iv, link_print_vd_iv) {
    back_vd_iv.style.display = 'block';
    document.getElementById('img_produk_vd_iv').src = img_produk_vd_iv;
    document.getElementById('judul_produk_vd_iv').innerHTML = judul_produk_vd_iv;
    document.getElementById('kategori_vd_iv').innerHTML = kategori_vd_iv;
    document.getElementById('kuantitas_vd_iv').innerHTML = kuantitas_vd_iv;
    document.getElementById('id_pesanan_vd_iv').innerHTML = id_pesanan_vd_iv;
    document.getElementById('status_pesanan_vd_iv').innerHTML = status_pesanan_vd_iv;
    document.getElementById('status_pembayaran_vd_iv').innerHTML = status_pembayaran_vd_iv;
    document.getElementById('nama_pembeli_vd_iv').innerHTML = nama_pembeli_vd_iv;
    document.getElementById('alamat_pembeli_vd_iv').innerHTML = alamat_pembeli_vd_iv;
    document.getElementById('kurir_pengiriman_vd_iv').innerHTML = kurir_pengiriman_vd_iv;
    document.getElementById('total_pembayaran_vd_iv').innerHTML = total_pembayaran_vd_iv;
    document.getElementById('link_print_vd_iv').href = link_print_vd_iv;
}

function close_detail_invoice() {
    back_vd_iv.style.display = 'none';
}

function show_resi_pengiriman(idinvoice_srp) {
    back_up_ri.style.display = 'flex';
    idinvoice_pss.value = idinvoice_srp;
}

function add_resi_pengiriman() {
    if (resi_pengiriman_v.value == '') {
        resi_pengiriman_v.style.borderColor = '#EA2027';
    } else {
        resi_pengiriman_v.style.borderColor = '#e2e2e2';
        back_up_ri.style.display = 'none';
        step_dikirim();
    }
}

function step_paket_konfirmasi(idinvoice_pss, id_usr_tm) {
    var text_pss_add_tm = 'text_spk' + idinvoice_pss;
    var load_pss_add_tm = 'load_spk' + idinvoice_pss;
    var data_update_dikitim_tm = new FormData();
    data_update_dikitim_tm.append('idinvoice_pss', idinvoice_pss);
    data_update_dikitim_tm.append('id_usr_tm', id_usr_tm);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            document.getElementById(text_pss_add_tm).style.display = 'none';
            document.getElementById(load_pss_add_tm).style.display = 'block';
        }
        if (this.readyState == 4 && this.status == 200) {
            url_lt = '../../system/admin/transaction/belum-bayar.php';
            req_list_transaksi(url_lt);
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', '../../system/admin/transaction/update-dikemas-tm.php', true);
    xhttp.send(data_update_dikitim_tm);
}