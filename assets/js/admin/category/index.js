function show_add_kategori() {
    tambah_kategori_form.style.display = 'flex';
}

function batal_add_kategori() {
    tambah_kategori_form.style.display = 'none';
}

function simpan_add_kategori() {
    if (icon_file.value == '') {
        icon_file.style.border = '1px solid #EA2027';
        p_icon_file.style.color = '#EA2027';
    } else {
        icon_file.style.border = '1px solid #e2e2e2';
        p_icon_file.style.color = '#505050';
    }
    if (nama_kategori.value == '') {
        nama_kategori.style.border = '1px solid #EA2027';
        p_nama_kategori.style.color = '#EA2027';
    } else {
        nama_kategori.style.border = '1px solid #e2e2e2';
        p_nama_kategori.style.color = '#505050';
    }
    if (icon_file.value && nama_kategori.value) {
        var data_add_kategori = new FormData();
        data_add_kategori.append('icon_file', document.getElementById('icon_file').files[0]);
        data_add_kategori.append('nama_kategori', document.getElementById('nama_kategori').value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                text_tkat.style.display = 'none';
                loading_tkat.style.display = 'block';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('res').innerHTML = this.responseText;
                text_tkat.style.display = 'block';
                loading_tkat.style.display = 'none';
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open('POST', '../../system/admin/category/add-kategori.php', true);
        xhttp.send(data_add_kategori);
    }
}

function show_confirm_hapus(id_kat_hapus) {
    confirm_hapus.style.display = 'flex';
    val_id_kategori.value = id_kat_hapus;
}

function batal_hapus_kategori() {
    confirm_hapus.style.display = 'none';
    val_id_kategori.value = '';
}

function hapus_kategori_ya() {
    var data_hapus_kategori = new FormData();
    data_hapus_kategori.append('val_id_kategori', document.getElementById('val_id_kategori').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            text_ha_kat.style.display = 'none';
            loading_ha_kat.style.display = 'block';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            text_ha_kat.style.display = 'block';
            loading_ha_kat.style.display = 'none';
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', '../../system/admin/category/delete-kategori.php', true);
    xhttp.send(data_hapus_kategori);
}

function show_edit_kategori(id_kat_edit, nama_kat_edit, img_kat_edit) {
    edit_kategori_form.style.display = 'flex';
    val_id_kat_hapus.value = id_kat_edit;
    nama_kategori_edit.value = nama_kat_edit;
    img_edit_kategori.src = img_kat_edit;
}

function batal_edit_kategori() {
    edit_kategori_form.style.display = 'none';
    val_id_kat_hapus.value = '';
}

function simpan_edit_kategori() {
    if (nama_kategori_edit.value == '') {
        nama_kategori_edit.style.border = '1px solid #EA2027';
        p_nama_kategori_edit.style.color = '#EA2027';
    } else {
        nama_kategori_edit.style.border = '1px solid #e2e2e2';
        p_nama_kategori_edit.style.color = '#505050';
    }
    if (nama_kategori_edit.value) {
        var data_edit_kategori = new FormData();
        data_edit_kategori.append('icon_file_edit', document.getElementById('icon_file_edit').files[0]);
        data_edit_kategori.append('nama_kategori_edit', document.getElementById('nama_kategori_edit').value);
        data_edit_kategori.append('val_id_kat_hapus', document.getElementById('val_id_kat_hapus').value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                text_ekat.style.display = 'none';
                loading_ekat.style.display = 'block';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('res').innerHTML = this.responseText;
                text_ekat.style.display = 'block';
                loading_ekat.style.display = 'none';
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open('POST', '../../system/admin/category/edit-kategori.php', true);
        xhttp.send(data_edit_kategori);
    }
}