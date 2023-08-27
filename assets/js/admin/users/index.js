function show_confirm_hapus(id_user) {
    confirm_hapus.style.display = 'flex';
    val_id_user.value = id_user;
}

function batal_hapus_akun() {
    confirm_hapus.style.display = 'none';
}

function hapus_akun() {
    var data_hapus_akun = new FormData();
    data_hapus_akun.append('val_id_user', document.getElementById('val_id_user').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            text_ha.style.display = 'none';
            loading_ha.style.display = 'block';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            text_ha.style.display = 'block';
            loading_ha.style.display = 'none';
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', '../../system/admin/users/delete-user.php', true);
    xhttp.send(data_hapus_akun);
}

function show_edit_akun(id_user_ed, nama_lengkap_ed, email_ed, no_wa_ed, tipe_akun_ed) {
    nama_lengkap_edt.value = nama_lengkap_ed;
    email_edt.value = email_ed;
    no_wa_edt.value = no_wa_ed;
    tipe_akun_edt.value = tipe_akun_ed;
    id_user_edit_akun.value = id_user_ed;
    box_edit_akun.style.display = 'flex';
}

function batal_edit_iklan() {
    nama_lengkap_edt.value = '';
    email_edt.value = '';
    no_wa_edt.value = '';
    tipe_akun_edt.value = '';
    id_user_edit_akun.value = '';
    box_edit_akun.style.display = 'none';
}

function simpan_edit_iklan() {
    var data_edit_akun = new FormData();
    data_edit_akun.append('nama_lengkap_edt', document.getElementById('nama_lengkap_edt').value);
    data_edit_akun.append('email_edt', document.getElementById('email_edt').value);
    data_edit_akun.append('no_wa_edt', document.getElementById('no_wa_edt').value);
    data_edit_akun.append('tipe_akun_edt', document.getElementById('tipe_akun_edt').value);
    data_edit_akun.append('id_user_edit_akun', document.getElementById('id_user_edit_akun').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            text_ea.style.display = 'none';
            loading_ea.style.display = 'block';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            text_ea.style.display = 'block';
            loading_ea.style.display = 'none';
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', '../../system/admin/users/edit-user.php', true);
    xhttp.send(data_edit_akun);
}