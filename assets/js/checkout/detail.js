function changeProvinsi() {
    kota.value = '';
    var data_provinsi = new FormData();
    data_provinsi.append('id_provinsi', document.getElementById('provinsi').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('kota').innerHTML = this.responseText;
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open("POST", "../../system/checkout/req-kota.php", true);
    xhttp.send(data_provinsi);
}

function SimpanLlokasi(id_inv_sl) {
    if (provinsi.value == '') {
        provinsi.style.borderColor = '#EA2027';
    } else {
        provinsi.style.borderColor = '#e2e2e2';
    }
    if (kota.value == '') {
        kota.style.borderColor = '#EA2027';
    } else {
        kota.style.borderColor = '#e2e2e2';
    }
    if (alamat_lengkap.value == '') {
        alamat_lengkap.style.borderColor = '#EA2027';
    } else {
        provinsi.style.borderColor = '#e2e2e2';
    }
    if (provinsi.value && kota.value && alamat_lengkap.value) {
        var data_lokasi = new FormData();
        data_lokasi.append('id_invoice', id_inv_sl);
        data_lokasi.append('id_provinsi', document.getElementById('provinsi').value);
        data_lokasi.append('id_kota', document.getElementById('kota').value);
        data_lokasi.append('alamat_lengkap', document.getElementById('alamat_lengkap').value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                simpan_lokasi.style.display = 'none';
                loading_lokasi.style.display = 'flex';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('res').innerHTML = this.responseText;
                simpan_lokasi.style.display = 'flex';
                loading_lokasi.style.display = 'none';
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open("POST", "../../system/checkout/save-location.php", true);
        xhttp.send(data_lokasi);
    }
}

function BatalLlokasi() {
    setting_lokasi.style.display = 'none';
}

function ubahAlamat() {
    setting_lokasi.style.display = 'flex';
}

function UbahOngkir(id_kota_tujuan) {
    console.log(id_kota_tujuan);
    var data_ongkir = new FormData();
    data_ongkir.append('id_kota_tujuan_v', id_kota_tujuan);
    data_ongkir.append('berat_barang', document.getElementById('berat_barang').value);
    data_ongkir.append('jumlah_barang', document.getElementById('jumlah_barang').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            ubah_ongkir.style.display = 'block';
            body.style.overflow = 'hidden';
            loading_ubah_ongkir.style.display = 'block';
            res_ubah_ongkir.style.display = 'none';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res_ubah_ongkir').innerHTML = this.responseText;
            loading_ubah_ongkir.style.display = 'none';
            res_ubah_ongkir.style.display = 'grid';
        }
    }
    xhttp.open("POST", "../../system/checkout/pilih-ongkir.php", true);
    xhttp.send(data_ongkir);
}

function CloseUbahOngkir() {
    ubah_ongkir.style.display = 'none';
    body.style.overflow = 'auto';
}

function UbahOpsiOngkir(name_kurir, idarr_kurir, kurir_layanan_ongkir, etd_ongkir, harga_ongkir) {
    var data_ubah_ongkir = new FormData();
    data_ubah_ongkir.append('id_invoice', document.getElementById('id_invoice').value);
    data_ubah_ongkir.append('name_kurir', name_kurir);
    data_ubah_ongkir.append('idarr_kurir', idarr_kurir);
    data_ubah_ongkir.append('kurir_layanan_ongkir', kurir_layanan_ongkir);
    data_ubah_ongkir.append('etd_ongkir', etd_ongkir);
    data_ubah_ongkir.append('harga_ongkir', harga_ongkir);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            ubah_ongkir.style.display = 'none';
            body.style.overflow = 'auto';
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open("POST", "../../system/checkout/ubah-ongkir.php", true);
    xhttp.send(data_ubah_ongkir);
}

function change_image() {
    const file = document.getElementById('inp_bukti_transfer').files[0];
    const fileType = file['type'];
    const validImageTypes = ['image/jpeg', 'image/png'];
    if (!validImageTypes.includes(fileType)) {
        alert_file_npng_bt.style.display = 'block';
        inp_bukti_transfer.value = '';
    } else {
        alert_file_npng_bt.style.display = 'none';
    }
}

function upload_bukti_transfer_manual(id_inv_bt, nama_bank_bt) {
    if (inp_bukti_transfer.value == '') {
        inp_bukti_transfer.style.borderColor = '#EA2027';
    } else {
        inp_bukti_transfer.style.borderColor = '#e2e2e2';
        var data_bukti_transfer = new FormData();
        data_bukti_transfer.append('inp_bukti_transfer', document.getElementById('inp_bukti_transfer').files[0]);
        data_bukti_transfer.append('id_inv_bt', id_inv_bt);
        data_bukti_transfer.append('nama_bank_bt', nama_bank_bt);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                ubt.style.display = 'none';
                loading_ubt.style.display = 'flex';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('res').innerHTML = this.responseText;
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open("POST", "../../system/checkout/upload-bukti-transfer.php", true);
        xhttp.send(data_bukti_transfer);
    }
}

function pembayaran_manual_show() {
    back_transfer_manual.style.display = 'flex';
}