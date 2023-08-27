window.onload = function () {
    p_header_setting.click();
}

p_header_setting.onclick = function () {
    p_header_setting.className = 'isi_menu_settings_adm_active';
    p_footer_setting.className = 'isi_menu_settings_adm';
    p_apikey_setting.className = 'isi_menu_settings_adm';
    p_lokasi_setting.className = 'isi_menu_settings_adm';
    p_metode_pembayaran.className = 'isi_menu_settings_adm';
    p_email_smtp.className = 'isi_menu_settings_adm';
    header_setting.style.display = 'block';
    footer_setting.style.display = 'none';
    apikey_setting.style.display = 'none';
    lokasi_setting.style.display = 'none';
    metode_pembayaran_setting.style.display = 'none';
    email_smtp_setting.style.display = 'none';
}

p_footer_setting.onclick = function () {
    p_header_setting.className = 'isi_menu_settings_adm';
    p_footer_setting.className = 'isi_menu_settings_adm_active';
    p_apikey_setting.className = 'isi_menu_settings_adm';
    p_lokasi_setting.className = 'isi_menu_settings_adm';
    p_metode_pembayaran.className = 'isi_menu_settings_adm';
    p_email_smtp.className = 'isi_menu_settings_adm';
    header_setting.style.display = 'none';
    footer_setting.style.display = 'block';
    apikey_setting.style.display = 'none';
    lokasi_setting.style.display = 'none';
    metode_pembayaran_setting.style.display = 'none';
    email_smtp_setting.style.display = 'none';
}

p_apikey_setting.onclick = function () {
    p_header_setting.className = 'isi_menu_settings_adm';
    p_footer_setting.className = 'isi_menu_settings_adm';
    p_apikey_setting.className = 'isi_menu_settings_adm_active';
    p_lokasi_setting.className = 'isi_menu_settings_adm';
    p_metode_pembayaran.className = 'isi_menu_settings_adm';
    p_email_smtp.className = 'isi_menu_settings_adm';
    header_setting.style.display = 'none';
    footer_setting.style.display = 'none';
    apikey_setting.style.display = 'block';
    lokasi_setting.style.display = 'none';
    metode_pembayaran_setting.style.display = 'none';
    email_smtp_setting.style.display = 'none';
}

p_lokasi_setting.onclick = function () {
    p_header_setting.className = 'isi_menu_settings_adm';
    p_footer_setting.className = 'isi_menu_settings_adm';
    p_apikey_setting.className = 'isi_menu_settings_adm';
    p_lokasi_setting.className = 'isi_menu_settings_adm_active';
    p_metode_pembayaran.className = 'isi_menu_settings_adm';
    p_email_smtp.className = 'isi_menu_settings_adm';
    header_setting.style.display = 'none';
    footer_setting.style.display = 'none';
    apikey_setting.style.display = 'none';
    lokasi_setting.style.display = 'block';
    metode_pembayaran_setting.style.display = 'none';
    email_smtp_setting.style.display = 'none';
}

p_metode_pembayaran.onclick = function () {
    p_header_setting.className = 'isi_menu_settings_adm';
    p_footer_setting.className = 'isi_menu_settings_adm';
    p_apikey_setting.className = 'isi_menu_settings_adm';
    p_lokasi_setting.className = 'isi_menu_settings_adm';
    p_metode_pembayaran.className = 'isi_menu_settings_adm_active';
    p_email_smtp.className = 'isi_menu_settings_adm';
    header_setting.style.display = 'none';
    footer_setting.style.display = 'none';
    apikey_setting.style.display = 'none';
    lokasi_setting.style.display = 'none';
    metode_pembayaran_setting.style.display = 'block';
    email_smtp_setting.style.display = 'none';
}

p_email_smtp.onclick = function () {
    p_header_setting.className = 'isi_menu_settings_adm';
    p_footer_setting.className = 'isi_menu_settings_adm';
    p_apikey_setting.className = 'isi_menu_settings_adm';
    p_lokasi_setting.className = 'isi_menu_settings_adm';
    p_metode_pembayaran.className = 'isi_menu_settings_adm';
    p_email_smtp.className = 'isi_menu_settings_adm_active';
    header_setting.style.display = 'none';
    footer_setting.style.display = 'none';
    apikey_setting.style.display = 'none';
    lokasi_setting.style.display = 'none';
    metode_pembayaran_setting.style.display = 'none';
    email_smtp_setting.style.display = 'block';
}

function c_ubah_logo() {
    ubah_logo_cf_hs.click();
}

function change_ubah_logo(event) {
    const file = document.getElementById('ubah_logo_cf_hs').files[0];
    const fileType = file['type'];
    const validImageTypes = ['image/svg+xml', 'image/png'];
    if (!validImageTypes.includes(fileType)) {
        err_foto_hs.style.display = 'block';
        ubah_logo_cf_hs.value = '';
    } else {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('view_logo_hs');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
        err_foto_hs.style.display = 'none';
    }
}

function simpan_header() {
    var data_header_hs = new FormData();
    data_header_hs.append('ubah_logo_cf_hs', document.getElementById('ubah_logo_cf_hs').files[0]);
    data_header_hs.append('nama_perusahaan_hs', document.getElementById('nama_perusahaan_hs').value);
    data_header_hs.append('placeh_search_hs', document.getElementById('placeh_search_hs').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            text_s_hs.style.display = 'none';
            loading_s_hs.style.display = 'flex';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            text_s_hs.style.display = 'flex';
            loading_s_hs.style.display = 'none';
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', '../../system/admin/settings/header.php', true);
    xhttp.send(data_header_hs);
}

function simpan_footer() {
    var data_social_fo = new FormData();
    data_social_fo.append('link_social_fo1', document.getElementById('link_social_fo1').value);
    data_social_fo.append('link_social_fo2', document.getElementById('link_social_fo2').value);
    data_social_fo.append('link_social_fo3', document.getElementById('link_social_fo3').value);
    data_social_fo.append('link_social_fo4', document.getElementById('link_social_fo4').value);
    data_social_fo.append('link_social_fo5', document.getElementById('link_social_fo5').value);
    data_social_fo.append('link_social_fo6', document.getElementById('link_social_fo6').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            text_s_fo.style.display = 'none';
            loading_s_fo.style.display = 'flex';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            text_s_fo.style.display = 'flex';
            loading_s_fo.style.display = 'none';
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', '../../system/admin/settings/footer.php', true);
    xhttp.send(data_social_fo);
}

function simpan_apikey() {
    if (google_client_id_key_ak.value == '') {
        p_google_client_id_key_ak.style.color = '#EA2027';
        google_client_id_key_ak.style.border = '1px solid #EA2027';
    } else {
        p_google_client_id_key_ak.style.color = '#959595';
        google_client_id_key_ak.style.border = '1px solid #e2e2e2';
    }
    if (google_client_secret_key_ak.value == '') {
        p_google_client_secret_key_ak.style.color = '#EA2027';
        google_client_secret_key_ak.style.border = '1px solid #EA2027';
    } else {
        p_google_client_secret_key_ak.style.color = '#959595';
        google_client_secret_key_ak.style.border = '1px solid #e2e2e2';
    }
    if (midtrans_client_key_ak.value == '') {
        p_midtrans_client_key_ak.style.color = '#EA2027';
        midtrans_client_key_ak.style.border = '1px solid #EA2027';
    } else {
        p_midtrans_client_key_ak.style.color = '#959595';
        midtrans_client_key_ak.style.border = '1px solid #e2e2e2';
    }
    if (midtrans_server_key_ak.value == '') {
        p_midtrans_server_key_ak.style.color = '#EA2027';
        midtrans_server_key_ak.style.border = '1px solid #EA2027';
    } else {
        p_midtrans_server_key_ak.style.color = '#959595';
        midtrans_server_key_ak.style.border = '1px solid #e2e2e2';
    }
    if (raja_ongkir_key_ak.value == '') {
        p_raja_ongkir_key_ak.style.color = '#EA2027';
        raja_ongkir_key_ak.style.border = '1px solid #EA2027';
    } else {
        p_raja_ongkir_key_ak.style.color = '#959595';
        raja_ongkir_key_ak.style.border = '1px solid #e2e2e2';
    }
    if (google_client_id_key_ak.value && google_client_secret_key_ak.value && midtrans_client_key_ak.value && midtrans_server_key_ak.value && raja_ongkir_key_ak.value) {
        var data_apikey_ak = new FormData();
        data_apikey_ak.append('google_client_id_key_ak', document.getElementById('google_client_id_key_ak').value);
        data_apikey_ak.append('google_client_secret_key_ak', document.getElementById('google_client_secret_key_ak').value);
        data_apikey_ak.append('midtrans_client_key_ak', document.getElementById('midtrans_client_key_ak').value);
        data_apikey_ak.append('midtrans_server_key_ak', document.getElementById('midtrans_server_key_ak').value);
        data_apikey_ak.append('raja_ongkir_key_ak', document.getElementById('raja_ongkir_key_ak').value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                text_s_ak.style.display = 'none';
                loading_s_ak.style.display = 'flex';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('res').innerHTML = this.responseText;
                text_s_ak.style.display = 'flex';
                loading_s_ak.style.display = 'none';
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open('POST', '../../system/admin/settings/apikey.php', true);
        xhttp.send(data_apikey_ak);
    }
}

function change_provinsi() {
    var data_lokasi_provinsi = new FormData();
    data_lokasi_provinsi.append('id_provinsi', document.getElementById('provinsi_ls').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            kota_ls.value = '';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('kota_ls').innerHTML = this.responseText;
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', '../../system/location/kota.php', true);
    xhttp.send(data_lokasi_provinsi);
}

function simpan_lokasi() {
    if (provinsi_ls.value == '') {
        //p_provinsi_ls.style.color = '#EA2027';
        provinsi_ls.style.border = '1px solid #EA2027';
    } else {
        //p_provinsi_ls.style.color = '#959595';
        provinsi_ls.style.border = '1px solid #e2e2e2';
    }
    if (kota_ls.value == '') {
        //p_kota_ls.style.color = '#EA2027';
        kota_ls.style.border = '1px solid #EA2027';
    } else {
        //p_kota_ls.style.color = '#959595';
        kota_ls.style.border = '1px solid #e2e2e2';
    }
    if (provinsi_ls.value && kota_ls.value) {
        var data_lokasi_update = new FormData();
        data_lokasi_update.append('provinsi_ls', document.getElementById('provinsi_ls').value);
        data_lokasi_update.append('kota_ls', document.getElementById('kota_ls').value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                text_s_lc.style.display = 'none';
                loading_s_lc.style.display = 'flex';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('res').innerHTML = this.responseText;
                text_s_lc.style.display = 'flex';
                loading_s_lc.style.display = 'none';
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open('POST', '../../system/admin/settings/location.php', true);
        xhttp.send(data_lokasi_update);
    }
}

function simpan_metode_pembayaran() {
    if (nama_bank.value == '') {
        p_nama_bank.style.color = '#EA2027';
        nama_bank.style.border = '1px solid #EA2027';
    } else {
        p_nama_bank.style.color = '#959595';
        nama_bank.style.border = '1px solid #e2e2e2';
    }
    if (norek.value == '') {
        p_norek.style.color = '#EA2027';
        norek.style.border = '1px solid #EA2027';
    } else {
        p_norek.style.color = '#959595';
        norek.style.border = '1px solid #e2e2e2';
    }
    if (atas_nama.value == '') {
        p_atas_nama.style.color = '#EA2027';
        atas_nama.style.border = '1px solid #EA2027';
    } else {
        p_atas_nama.style.color = '#959595';
        atas_nama.style.border = '1px solid #e2e2e2';
    }
    if (nama_bank.value && norek.value && atas_nama.value) {
        var data_metode_pembayaran = new FormData();
        data_metode_pembayaran.append('inp_tipe_mp', document.getElementById('inp_tipe_mp').value);
        data_metode_pembayaran.append('nama_bank', document.getElementById('nama_bank').value);
        data_metode_pembayaran.append('norek', document.getElementById('norek').value);
        data_metode_pembayaran.append('atas_nama', document.getElementById('atas_nama').value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                text_s_lmp.style.display = 'none';
                loading_s_lmp.style.display = 'flex';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('res').innerHTML = this.responseText;
                text_s_lmp.style.display = 'flex';
                loading_s_lmp.style.display = 'none';
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open('POST', '../../system/admin/settings/metode-pembayaran.php', true);
        xhttp.send(data_metode_pembayaran);
    }
}

function simpan_email_smtp() {
    if (email_notif_adm.value == '') {
        p_email_notif_adm.style.color = '#EA2027';
        email_notif_adm.style.border = '1px solid #EA2027';
    } else {
        p_email_notif_adm.style.color = '#959595';
        email_notif_adm.style.border = '1px solid #e2e2e2';
    }
    if (host_smtp.value == '') {
        p_host_smtp.style.color = '#EA2027';
        host_smtp.style.border = '1px solid #EA2027';
    } else {
        p_host_smtp.style.color = '#959595';
        host_smtp.style.border = '1px solid #e2e2e2';
    }
    if (port_smtp.value == '') {
        p_port_smtp.style.color = '#EA2027';
        port_smtp.style.border = '1px solid #EA2027';
    } else {
        p_port_smtp.style.color = '#959595';
        port_smtp.style.border = '1px solid #e2e2e2';
    }
    if (username_smtp.value == '') {
        p_username_smtp.style.color = '#EA2027';
        username_smtp.style.border = '1px solid #EA2027';
    } else {
        p_username_smtp.style.color = '#959595';
        username_smtp.style.border = '1px solid #e2e2e2';
    }
    if (password_smtp.value == '') {
        p_password_smtp.style.color = '#EA2027';
        password_smtp.style.border = '1px solid #EA2027';
    } else {
        p_password_smtp.style.color = '#959595';
        password_smtp.style.border = '1px solid #e2e2e2';
    }
    if (setfrom_smtp.value == '') {
        p_setfrom_smtp.style.color = '#EA2027';
        setfrom_smtp.style.border = '1px solid #EA2027';
    } else {
        p_setfrom_smtp.style.color = '#959595';
        setfrom_smtp.style.border = '1px solid #e2e2e2';
    }
    if (email_notif_adm.value && host_smtp.value && port_smtp.value && username_smtp.value && password_smtp.value && setfrom_smtp.value) {
        var data_email_smtp = new FormData();
        data_email_smtp.append('email_notif_adm', document.getElementById('email_notif_adm').value);
        data_email_smtp.append('host_smtp', document.getElementById('host_smtp').value);
        data_email_smtp.append('port_smtp', document.getElementById('port_smtp').value);
        data_email_smtp.append('username_smtp', document.getElementById('username_smtp').value);
        data_email_smtp.append('password_smtp', document.getElementById('password_smtp').value);
        data_email_smtp.append('setfrom_smtp', document.getElementById('setfrom_smtp').value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                text_s_esmtp.style.display = 'none';
                loading_s_esmtp.style.display = 'flex';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('res').innerHTML = this.responseText;
                text_s_esmtp.style.display = 'flex';
                loading_s_esmtp.style.display = 'none';
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open('POST', '../../system/admin/settings/email-smtp.php', true);
        xhttp.send(data_email_smtp);
    }
}