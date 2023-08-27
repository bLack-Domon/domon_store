function add_banner_promo() {
    pilih_banner.click();
}

function add_new_banner() {
    var data_add_new_banner = new FormData();
    data_add_new_banner.append('pilih_banner', document.getElementById('pilih_banner').files[0]);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            box_add_banner_promo.style.display = 'none';
            loading_add_banner_promo.style.display = 'block';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            box_add_banner_promo.style.display = 'block';
            loading_add_banner_promo.style.display = 'none';
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', '../../system/admin/promotion/add-banner.php', true);
    xhttp.send(data_add_new_banner);
}

function nonaktif_banner(id_banner) {
    var add_nameidbanner = 'box_status_banner_promo' + id_banner;
    var ns_banner_promo = 'ns_banner_promo' + id_banner;
    document.getElementById(add_nameidbanner).className = 'box_status_banner_promo_nonactive';
    document.getElementById(ns_banner_promo).innerHTML = 'Tidak Aktif';
}

function aktif_banner(id_banner) {
    var add_nameidbanner = 'box_status_banner_promo' + id_banner;
    var ns_banner_promo = 'ns_banner_promo' + id_banner;
    document.getElementById(add_nameidbanner).className = 'box_status_banner_promo';
    document.getElementById(ns_banner_promo).innerHTML = 'Aktif';
}

function show_hapus_banner(id_banner_hapus) {
    confirm_hapus.style.display = 'flex';
    val_id_banner.value = id_banner_hapus;
}

function batal_hapus_banner() {
    confirm_hapus.style.display = 'none';
    val_id_banner.value = '';
}

function hapus_banner() {
    var data_hapus_banner = new FormData();
    data_hapus_banner.append('val_id_banner', document.getElementById('val_id_banner').value);
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
    xhttp.open('POST', '../../system/admin/promotion/delete-banner.php', true);
    xhttp.send(data_hapus_banner);
}

function click_edit_banner(id_edit_banner_val) {
    id_edit_banner.value = id_edit_banner_val;
    edit_banner_click.click();
}

function edit_banner_now() {
    var data_edit_banner = new FormData();
    data_edit_banner.append('edit_banner_click', document.getElementById('edit_banner_click').files[0]);
    data_edit_banner.append('id_edit_banner', document.getElementById('id_edit_banner').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', '../../system/admin/promotion/edit-banner.php', true);
    xhttp.send(data_edit_banner);
}