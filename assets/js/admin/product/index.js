function currency(value, separator) {
    if (typeof value == "undefined") return "0";
    if (typeof separator == "undefined" || !separator) separator = ",";
    return value.toString().replace(/[^\d]+/g, "").replace(/\B(?=(?:\d{3})+(?!\d))/g, separator);
}
window.addEventListener('keyup', function (e) {
    var el = e.target;
    if (el.classList.contains('currency')) {
        el.value = currency(el.value, el.getAttribute('data-separator'));
    }
    false
});

function click_img() {
    if (c_img_tp_1.value == '') {
        c_img_tp_1.click();
    } else if (c_img_tp_2.value == '') {
        c_img_tp_2.click();
    } else if (c_img_tp_3.value == '') {
        c_img_tp_3.click();
    } else if (c_img_tp_4.value == '') {
        c_img_tp_4.click();
    } else if (c_img_tp_5.value == '') {
        c_img_tp_5.click();
    }
}

function preview_image(event, id_show_img_tp) {
    var reader = new FileReader();
    reader.onload = function () {
        var n_show_img_tp = 'show_img_tp_' + id_show_img_tp;
        var n_icon_tp = 'icon_tp_' + id_show_img_tp;
        var output = document.getElementById(n_show_img_tp);
        output.src = reader.result;
        document.getElementById(n_icon_tp).style.display = 'none';
        document.getElementById(n_show_img_tp).style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}

function click_img_ep(no_img_epc) {
    var add_val_img_ed_ep = 'val_img_ed_ep' + no_img_epc;
    var s_val_img_ed_ep = document.getElementById(add_val_img_ed_ep).value;
    if (s_val_img_ed_ep == '') {
        if (val_img_ed_ep1.value == '') {
            c_img_ep_1.click();
        } else if (val_img_ed_ep2.value == '') {
            c_img_ep_2.click();
        } else if (val_img_ed_ep3.value == '') {
            c_img_ep_3.click();
        } else if (val_img_ed_ep4.value == '') {
            c_img_ep_4.click();
        } else if (val_img_ed_ep5.value == '') {
            c_img_ep_5.click();
        }
    } else {
        var add_c_img_ep = 'c_img_ep_' + no_img_epc;
        document.getElementById(add_c_img_ep).click();
    }
}

function preview_image_ep(event, id_show_img_tp) {
    var reader = new FileReader();
    reader.onload = function () {
        var n_show_img_tp = 'show_img_ep_' + id_show_img_tp;
        var n_icon_tp = 'icon_ep_' + id_show_img_tp;
        var n_val_img_ed_ep = 'val_img_ed_ep' + id_show_img_tp;
        var output = document.getElementById(n_show_img_tp);
        output.src = reader.result;
        document.getElementById(n_icon_tp).style.display = 'none';
        document.getElementById(n_show_img_tp).style.display = 'block';
        document.getElementById(n_val_img_ed_ep).value = '1';
    }
    reader.readAsDataURL(event.target.files[0]);
}

function show_add_produk() {
    back_tp_adm.style.display = 'block';
}

function batal_tp() {
    back_tp_adm.style.display = 'none';
}

function simpan_tp() {
    var jum_v_warna_val = document.getElementById('jum_v_warna').value;
    var hasil_get_value_v_warna_adm = [];
    for (let v_warna_adm_lp = 1; v_warna_adm_lp <= jum_v_warna_val; v_warna_adm_lp++) {
        var gab_v_warna_adm = 'v_warna_adm' + v_warna_adm_lp;
        var get_value_v_warna_adm = document.getElementById(gab_v_warna_adm).value;
        if (get_value_v_warna_adm == '') {
            document.getElementById(gab_v_warna_adm).style.border = '1px solid #EA2027';
            hasil_get_value_v_warna_adm[v_warna_adm_lp] = '0kosong0';
        } else {
            document.getElementById(gab_v_warna_adm).style.border = '1px solid #e2e2e2';
            hasil_get_value_v_warna_adm[v_warna_adm_lp] = get_value_v_warna_adm;
        }
    }
    var cek_varian_warna_tf = hasil_get_value_v_warna_adm.includes('0kosong0');

    var jum_v_ukuran_val = document.getElementById('jum_v_ukuran').value;
    var hasil_get_value_v_ukuran_adm = [];
    for (let v_ukuran_adm_lp = 1; v_ukuran_adm_lp <= jum_v_ukuran_val; v_ukuran_adm_lp++) {
        var gab_v_ukuran_adm = 'v_ukuran_adm' + v_ukuran_adm_lp;
        var gab_v_ukuran_harga_adm = 'v_ukuran_harga_adm' + v_ukuran_adm_lp;
        var get_value_v_ukuran_adm = document.getElementById(gab_v_ukuran_adm).value;
        var get_value_v_ukuran_harga_adm = document.getElementById(gab_v_ukuran_harga_adm).value;

        if (get_value_v_ukuran_adm == '' || get_value_v_ukuran_harga_adm == '') {
            document.getElementById(gab_v_ukuran_adm).style.border = '1px solid #EA2027';
            document.getElementById(gab_v_ukuran_harga_adm).style.border = '1px solid #EA2027';
            hasil_get_value_v_ukuran_adm[v_ukuran_adm_lp] = '0kosong0===0kosong0';
        } else {
            document.getElementById(gab_v_ukuran_adm).style.border = '1px solid #e2e2e2';
            document.getElementById(gab_v_ukuran_harga_adm).style.border = '1px solid #e2e2e2';
            hasil_get_value_v_ukuran_adm[v_ukuran_adm_lp] = get_value_v_ukuran_adm + '===' + get_value_v_ukuran_harga_adm;
        }
    }
    var cek_varian_ukuran_tf = hasil_get_value_v_ukuran_adm.includes('0kosong0===0kosong0');

    if (judul_tp.value == '') {
        judul_tp.style.border = '1px solid #EA2027';
    } else {
        judul_tp.style.border = '1px solid #e2e2e2';
    }
    if (harga_tp.value == '') {
        harga_tp.style.border = '1px solid #EA2027';
    } else {
        harga_tp.style.border = '1px solid #e2e2e2';
    }
    if (kategori_tp.value == '') {
        kategori_tp.style.border = '1px solid #EA2027';
    } else {
        kategori_tp.style.border = '1px solid #e2e2e2';
    }
    if (berat_tp.value == '') {
        berat_tp.style.border = '1px solid #EA2027';
    } else {
        berat_tp.style.border = '1px solid #e2e2e2';
    }
    if (stok_tp.value == '') {
        stok_tp.style.border = '1px solid #EA2027';
    } else {
        stok_tp.style.border = '1px solid #e2e2e2';
    }
    if (deskripsi_tp.value == '') {
        deskripsi_tp.style.border = '1px solid #EA2027';
    } else {
        deskripsi_tp.style.border = '1px solid #e2e2e2';
    }
    if (c_img_tp_1.value == '') {
        isi_box_img_produk_tambah1.style.border = '1px solid #EA2027';
    } else {
        isi_box_img_produk_tambah1.style.border = '1px solid #e2e2e2';
    }
    if (judul_tp.value && harga_tp.value && kategori_tp.value && berat_tp.value && stok_tp.value && deskripsi_tp.value && c_img_tp_1.value && cek_varian_warna_tf == false && cek_varian_ukuran_tf == false) {
        var data_add_product = new FormData();
        data_add_product.append('judul_tp', document.getElementById('judul_tp').value);
        data_add_product.append('harga_tp', document.getElementById('harga_tp').value);
        data_add_product.append('kategori_tp', document.getElementById('kategori_tp').value);
        data_add_product.append('berat_tp', document.getElementById('berat_tp').value);
        data_add_product.append('stok_tp', document.getElementById('stok_tp').value);
        data_add_product.append('deskripsi_tp', document.getElementById('deskripsi_tp').value);
        data_add_product.append('c_img_tp_1', document.getElementById('c_img_tp_1').files[0]);
        data_add_product.append('c_img_tp_2', document.getElementById('c_img_tp_2').files[0]);
        data_add_product.append('c_img_tp_3', document.getElementById('c_img_tp_3').files[0]);
        data_add_product.append('c_img_tp_4', document.getElementById('c_img_tp_4').files[0]);
        data_add_product.append('c_img_tp_5', document.getElementById('c_img_tp_5').files[0]);
        data_add_product.append('varian_warna', hasil_get_value_v_warna_adm);
        data_add_product.append('varian_ukuran', hasil_get_value_v_ukuran_adm);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                text_tp.style.display = 'none';
                loading_tp.style.display = 'block';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('res').innerHTML = this.responseText;
                text_tp.style.display = 'block';
                loading_tp.style.display = 'none';
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open('POST', '../../system/admin/product/add-product.php', true);
        xhttp.send(data_add_product);
    }
}

function show_hapus_produk(id_h_produk) {
    popup_hapus_produk.style.display = 'flex';
    val_id_h_produk.value = id_h_produk;
}

function batal_hapus_produk() {
    popup_hapus_produk.style.display = 'none';
    val_id_h_produk.value = '';
}

function hapus_produk_ya() {
    var data_delete_product = new FormData();
    data_delete_product.append('val_id_h_produk', document.getElementById('val_id_h_produk').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            text_ha_hp.style.display = 'none';
            loading_ha_hp.style.display = 'block';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            text_ha_hp.style.display = 'block';
            loading_ha_hp.style.display = 'none';
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', '../../system/admin/product/delete-product.php', true);
    xhttp.send(data_delete_product);
}

function batal_ep() {
    back_ep_adm.style.display = 'none';
    judul_ep.value = '';
    harga_ep.value = '';
    kategori_ep_val.value = '';
    kategori_ep_val.innerHTML = '';
    berat_ep.value = '';
    stok_ep.value = '';
    deskripsi_ep.value = '';
    for (be_lop = 1; be_lop < 5; be_lop++) {
        var add_icon_ep = 'icon_ep_' + be_lop;
        var add_show_img_ep = 'show_img_ep_' + be_lop;
        var add_val_img_ed_ep = 'val_img_ed_ep' + be_lop;
        document.getElementById(add_icon_ep).style.display = 'block';
        document.getElementById(add_show_img_ep).style.display = 'none';
        document.getElementById(add_val_img_ed_ep).value = '';
    };
    for (lp_waruk_ep = 1; lp_waruk_ep < 10; lp_waruk_ep++) {
        var box_v_warna_adm_ep_cs = 'box_v_warna_adm_ep' + lp_waruk_ep;
        var v_warna_adm_ep_cs = 'v_warna_adm_ep' + lp_waruk_ep;
        document.getElementById(box_v_warna_adm_ep_cs).style.display = 'none';
        document.getElementById(v_warna_adm_ep_cs).value = '';

        var box_v_ukuran_adm_ep_cs = 'box_v_ukuran_adm_ep' + lp_waruk_ep;
        var v_ukuran_adm_ep_cs = 'v_ukuran_adm_ep' + lp_waruk_ep;
        var v_ukuran_harga_adm_ep_cs = 'v_ukuran_harga_adm_ep' + lp_waruk_ep;
        document.getElementById(box_v_ukuran_adm_ep_cs).style.display = 'none';
        document.getElementById(v_ukuran_adm_ep_cs).value = '';
        document.getElementById(v_ukuran_adm_ep_cs).value = '';
    };
    document.getElementById('jum_v_warna_ep').value = '0';
    document.getElementById('jum_v_ukuran_ep').value = '0';
}

function simpan_ep() {
    var jum_v_warna_val_ep = document.getElementById('jum_v_warna_ep').value;
    var hasil_get_value_v_warna_adm_ep = [];
    for (let v_warna_adm_lp_ep = 1; v_warna_adm_lp_ep <= jum_v_warna_val_ep; v_warna_adm_lp_ep++) {
        var gab_v_warna_adm_ep = 'v_warna_adm_ep' + v_warna_adm_lp_ep;
        var get_value_v_warna_adm_ep = document.getElementById(gab_v_warna_adm_ep).value;
        if (get_value_v_warna_adm_ep == '') {
            document.getElementById(gab_v_warna_adm_ep).style.border = '1px solid #EA2027';
            hasil_get_value_v_warna_adm_ep[v_warna_adm_lp_ep] = '0kosong0';
        } else {
            document.getElementById(gab_v_warna_adm_ep).style.border = '1px solid #e2e2e2';
            hasil_get_value_v_warna_adm_ep[v_warna_adm_lp_ep] = get_value_v_warna_adm_ep;
        }
    }
    var cek_varian_warna_tf_ep = hasil_get_value_v_warna_adm_ep.includes('0kosong0');

    var jum_v_ukuran_val_ep = document.getElementById('jum_v_ukuran_ep').value;
    var hasil_get_value_v_ukuran_adm_ep = [];
    for (let v_ukuran_adm_lp_ep = 1; v_ukuran_adm_lp_ep <= jum_v_ukuran_val_ep; v_ukuran_adm_lp_ep++) {
        var gab_v_ukuran_adm_ep = 'v_ukuran_adm_ep' + v_ukuran_adm_lp_ep;
        var gab_v_ukuran_harga_adm_ep = 'v_ukuran_harga_adm_ep' + v_ukuran_adm_lp_ep;
        var get_value_v_ukuran_adm = document.getElementById(gab_v_ukuran_adm_ep).value;
        var get_value_v_ukuran_harga_adm_ep = document.getElementById(gab_v_ukuran_harga_adm_ep).value;

        if (get_value_v_ukuran_adm == '' || get_value_v_ukuran_harga_adm_ep == '') {
            document.getElementById(gab_v_ukuran_adm_ep).style.border = '1px solid #EA2027';
            document.getElementById(gab_v_ukuran_harga_adm_ep).style.border = '1px solid #EA2027';
            hasil_get_value_v_ukuran_adm_ep[v_ukuran_adm_lp_ep] = '0kosong0===0kosong0';
        } else {
            document.getElementById(gab_v_ukuran_adm_ep).style.border = '1px solid #e2e2e2';
            document.getElementById(gab_v_ukuran_harga_adm_ep).style.border = '1px solid #e2e2e2';
            hasil_get_value_v_ukuran_adm_ep[v_ukuran_adm_lp_ep] = get_value_v_ukuran_adm + '===' + get_value_v_ukuran_harga_adm_ep;
        }
    }
    var cek_varian_ukuran_tf_ep = hasil_get_value_v_ukuran_adm_ep.includes('0kosong0===0kosong0');

    if (judul_ep.value == '') {
        judul_ep.style.border = '1px solid #EA2027';
    } else {
        judul_ep.style.border = '1px solid #e2e2e2';
    }
    if (harga_ep.value == '') {
        harga_ep.style.border = '1px solid #EA2027';
    } else {
        harga_ep.style.border = '1px solid #e2e2e2';
    }
    if (kategori_ep.value == '') {
        kategori_ep.style.border = '1px solid #EA2027';
    } else {
        kategori_ep.style.border = '1px solid #e2e2e2';
    }
    if (berat_ep.value == '') {
        berat_ep.style.border = '1px solid #EA2027';
    } else {
        berat_ep.style.border = '1px solid #e2e2e2';
    }
    if (stok_ep.value == '') {
        stok_ep.style.border = '1px solid #EA2027';
    } else {
        stok_ep.style.border = '1px solid #e2e2e2';
    }
    if (deskripsi_ep.value == '') {
        deskripsi_ep.style.border = '1px solid #EA2027';
    } else {
        deskripsi_ep.style.border = '1px solid #e2e2e2';
    }
    if (judul_ep.value && harga_ep.value && kategori_ep.value && berat_ep.value && stok_ep.value && deskripsi_ep.value && cek_varian_warna_tf_ep == false && cek_varian_ukuran_tf_ep == false) {
        var data_edit_product = new FormData();
        data_edit_product.append('id_produk_ep', document.getElementById('id_produk_ep').value);
        data_edit_product.append('judul_ep', document.getElementById('judul_ep').value);
        data_edit_product.append('harga_ep', document.getElementById('harga_ep').value);
        data_edit_product.append('kategori_ep', document.getElementById('kategori_ep').value);
        data_edit_product.append('berat_ep', document.getElementById('berat_ep').value);
        data_edit_product.append('stok_ep', document.getElementById('stok_ep').value);
        data_edit_product.append('deskripsi_ep', document.getElementById('deskripsi_ep').value);
        data_edit_product.append('c_img_ep_1', document.getElementById('c_img_ep_1').files[0]);
        data_edit_product.append('c_img_ep_2', document.getElementById('c_img_ep_2').files[0]);
        data_edit_product.append('c_img_ep_3', document.getElementById('c_img_ep_3').files[0]);
        data_edit_product.append('c_img_ep_4', document.getElementById('c_img_ep_4').files[0]);
        data_edit_product.append('c_img_ep_5', document.getElementById('c_img_ep_5').files[0]);
        data_edit_product.append('val_img_ed_ep1', document.getElementById('val_img_ed_ep1').value);
        data_edit_product.append('val_img_ed_ep2', document.getElementById('val_img_ed_ep2').value);
        data_edit_product.append('val_img_ed_ep3', document.getElementById('val_img_ed_ep3').value);
        data_edit_product.append('val_img_ed_ep4', document.getElementById('val_img_ed_ep4').value);
        data_edit_product.append('val_img_ed_ep5', document.getElementById('val_img_ed_ep5').value);
        data_edit_product.append('varian_warna_ep', hasil_get_value_v_warna_adm_ep);
        data_edit_product.append('varian_ukuran_ep', hasil_get_value_v_ukuran_adm_ep);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                text_ep.style.display = 'none';
                loading_ep.style.display = 'block';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('res').innerHTML = this.responseText;
                text_ep.style.display = 'block';
                loading_ep.style.display = 'none';
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open('POST', '../../system/admin/product/edit-product.php', true);
        xhttp.send(data_edit_product);
    }
}

function add_warna_varian() {
    var jum_v_warna_v = document.getElementById('jum_v_warna').value;
    var n_jum_v_warna_v = parseInt(jum_v_warna_v) + 1;
    var get_box_v_warna_adm = 'box_v_warna_adm' + n_jum_v_warna_v;
    document.getElementById(get_box_v_warna_adm).style.display = 'block';
    jum_v_warna.value = n_jum_v_warna_v;
    if (n_jum_v_warna_v > 9) {
        box_add_warna_varian_adm.style.display = 'none';
    }
}

function add_ukuran_varian() {
    var jum_v_ukuran_v = document.getElementById('jum_v_ukuran').value;
    var n_jum_v_ukuran_v = parseInt(jum_v_ukuran_v) + 1;
    var get_box_v_ukuran_adm = 'box_v_ukuran_adm' + n_jum_v_ukuran_v;
    document.getElementById(get_box_v_ukuran_adm).style.display = 'grid';
    jum_v_ukuran.value = n_jum_v_ukuran_v;
    if (n_jum_v_ukuran_v > 9) {
        box_add_ukuran_varian_adm.style.display = 'none';
    }
}

function add_warna_varian_ep() {
    var jum_v_warna_ep_v = document.getElementById('jum_v_warna_ep').value;
    var n_jum_v_warna_ep_v = parseInt(jum_v_warna_ep_v) + 1;
    var get_box_v_warna_adm_ep = 'box_v_warna_adm_ep' + n_jum_v_warna_ep_v;
    document.getElementById(get_box_v_warna_adm_ep).style.display = 'block';
    jum_v_warna_ep.value = n_jum_v_warna_ep_v;
    if (n_jum_v_warna_ep_v > 9) {
        box_add_warna_varian_adm_ep.style.display = 'none';
    }
}

function add_ukuran_varian_ep() {
    var jum_v_ukuran_ep_v = document.getElementById('jum_v_ukuran_ep').value;
    var n_jum_v_ukuran_ep_v = parseInt(jum_v_ukuran_ep_v) + 1;
    var get_box_v_ukuran_adm = 'box_v_ukuran_adm_ep' + n_jum_v_ukuran_ep_v;
    document.getElementById(get_box_v_ukuran_adm).style.display = 'grid';
    jum_v_ukuran_ep.value = n_jum_v_ukuran_ep_v;
    if (n_jum_v_ukuran_ep_v > 9) {
        box_add_ukuran_varian_adm_ep.style.display = 'none';
    }
}