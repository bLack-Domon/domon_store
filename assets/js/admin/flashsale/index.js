function show_et_fs() {
    box_edit_time_fs.style.display = 'flex';
}

function hide_et_fs() {
    box_edit_time_fs.style.display = 'none';
}

function simpan_et_fs() {
    var id_produk_new_fs = document.getElementById('time_fs').value;
    if (id_produk_new_fs == '') {
        time_fs.style.border = '1px solid #EA2027';
        p_input_fs.style.color = '#EA2027';
    } else {
        var d = new Date(id_produk_new_fs);
        var n = d.getTime();
        if (isNaN(n)) {
            time_fs.style.border = '1px solid #EA2027';
            p_input_fs.style.color = '#EA2027';
            p_input_fs.innerHTML = 'Format Waktu Tidak Benar';
        } else {
            time_fs.style.border = '1px solid #e2e2e2';
            p_input_fs.style.color = '#959595';
            p_input_fs.innerHTML = 'Waktu Flash Sale';
            var data_edit_timefs = new FormData();
            data_edit_timefs.append("time_fs_ub", document.getElementById('time_fs').value);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 1) {
                    t_bu_et_fs.style.display = 'none';
                    img_bu_et_fs.style.display = 'block';
                }
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('res').innerHTML = this.responseText;
                    t_bu_et_fs.style.display = 'block';
                    img_bu_et_fs.style.display = 'none';
                    var getscriptres = document.getElementsByTagName('script');
                    for (var i = 0; i < getscriptres.length - 0; i++) {
                        if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                    }
                }
            }
            xhttp.open("POST", "../../system/admin/flashsale/edit-time.php", true);
            xhttp.send(data_edit_timefs);
        }

    }
}

function show_tambah_produk_fs() {
    box_tp_fs.style.display = 'flex';
}

function hide_tp_fs() {
    box_tp_fs.style.display = 'none';
}

function simpan_tp_fs() {
    if (id_produk_new_fs.value == '') {
        id_produk_new_fs.style.border = '1px solid #EA2027';
        p_id_produk_new_fs.style.color = '#EA2027';
    } else {
        id_produk_new_fs.style.border = '1px solid #e2e2e2';
        p_id_produk_new_fs.style.color = '#959595';
    }
    if (persen_new_fs.value == '') {
        persen_new_fs.style.border = '1px solid #EA2027';
        p_persen_new_fs.style.color = '#EA2027';
    } else {
        persen_new_fs.style.border = '1px solid #e2e2e2';
        p_persen_new_fs.style.color = '#959595';
    }
    if (id_produk_new_fs.value && persen_new_fs.value) {
        var data_produk_add_fs = new FormData();
        data_produk_add_fs.append("id_produk_new_fs", document.getElementById('id_produk_new_fs').value);
        data_produk_add_fs.append("persen_new_fs", document.getElementById('persen_new_fs').value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                t_bu_tp_fs.style.display = 'none';
                img_bu_tp_fs.style.display = 'block';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('res').innerHTML = this.responseText;
                t_bu_tp_fs.style.display = 'block';
                img_bu_tp_fs.style.display = 'none';
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open("POST", "../../system/admin/flashsale/add-product.php", true);
        xhttp.send(data_produk_add_fs);
    }
}

function show_hapus_pro_fs(id_h_pro_fs) {
    popup_hapus_produk.style.display = 'flex';
    val_id_h_produk.value = id_h_pro_fs;
}

function batal_hapus_produk() {
    popup_hapus_produk.style.display = 'none';
    val_id_h_produk.value = '';
}

function hapus_produk_ya() {
    var data_produk_hapus_fs = new FormData();
    data_produk_hapus_fs.append("val_id_h_produk", document.getElementById('val_id_h_produk').value);
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
    xhttp.open("POST", "../../system/admin/flashsale/delete-product.php", true);
    xhttp.send(data_produk_hapus_fs);
}

function showg_edit_pro_fs(id_ep_fs, judul_ep_fs, diskon_ep_fs) {
    show_edit_pro_fs.style.display = 'flex';
    judul_e_fs.innerHTML = judul_ep_fs;
    persen_e_fs.value = diskon_ep_fs;
    id_edit_pro_fs.value = id_ep_fs;
}

function hide_edp_fs() {
    show_edit_pro_fs.style.display = 'none';
    judul_e_fs.innerHTML = '';
    persen_e_fs.value = '';
    id_edit_pro_fs.value = '';
}

function simpan_edp_fs() {
    var data_produk_edit_fs = new FormData();
    data_produk_edit_fs.append("id_edit_pro_fs", document.getElementById('id_edit_pro_fs').value);
    data_produk_edit_fs.append("persen_e_fs", document.getElementById('persen_e_fs').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            t_bu_edp_fs.style.display = 'none';
            img_bu_edp_fs.style.display = 'block';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            t_bu_edp_fs.style.display = 'block';
            img_bu_edp_fs.style.display = 'none';
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open("POST", "../../system/admin/flashsale/edit-product.php", true);
    xhttp.send(data_produk_edit_fs);
}