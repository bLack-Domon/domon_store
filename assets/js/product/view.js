window.onload = function () {
    
}

$('.owl-carousel').owlCarousel({
    items: 1,
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true
})

function rubah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
}

function kurang() {
    if (jumlah_produk.value > 1) {
        var kurang_jumlah = parseInt(jumlah_produk.value) - parseInt(1);
        jumlah_produk.value = kurang_jumlah;
        var ukuran_harga_value_id = ukuran_harga_satuan_value.value * kurang_jumlah;
        ukuran_harga_value.value = ukuran_harga_value_id;
        harga_varian_produk.innerHTML = rubah(ukuran_harga_value_id);
    }
}

function tambah(max_jumlah) {
    if (jumlah_produk.value < max_jumlah) {
        var tambah_jumlah = parseInt(jumlah_produk.value) + parseInt(1);
        jumlah_produk.value = tambah_jumlah;
        var ukuran_harga_value_id = ukuran_harga_satuan_value.value * tambah_jumlah;
        ukuran_harga_value.value = ukuran_harga_value_id;
        harga_varian_produk.innerHTML = rubah(ukuran_harga_value_id);
    }
}

function addcart(idproduk) {
    var data_add_cart = new FormData();
    data_add_cart.append("idproduk", idproduk);
    data_add_cart.append("jumlah_produk", document.getElementById('jumlah_produk').value);
    data_add_cart.append("warna_value", document.getElementById('warna_value').value);
    data_add_cart.append("ukuran_value", document.getElementById('ukuran_value').value);
    data_add_cart.append("ukuran_harga_satuan_value_send", document.getElementById('ukuran_harga_satuan_value_send').value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            masukan_keranjang.style.display = 'none';
            loading_masukan_keranjang.style.display = 'flex';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open("POST", "../../system/cart/add.php", true);
    xhttp.send(data_add_cart);
}

function removecart(idproduk) {
    console.log(idproduk);
    var data_remove_cart = new FormData();
    data_remove_cart.append('id_product', idproduk);
    data_remove_cart.append('page_product', 'produk view');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            masukan_keranjang2.style.display = 'none';
            loading_keranjang.style.display = 'flex';
            hapus_keranjang.style.display = 'none';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open("POST", "../../system/cart/remove.php", true);
    xhttp.send(data_remove_cart);
}

function checkout(idproduk) {
    var data_checkout_cart = new FormData();
    data_checkout_cart.append('id_product', idproduk);
    data_checkout_cart.append('jumlah_product', document.getElementById('jumlah_produk').value);
    data_checkout_cart.append('ukuran_harga_satuan_value_send', document.getElementById('ukuran_harga_satuan_value_send').value);
    data_checkout_cart.append('warna_k_val', document.getElementById('warna_value').value);
    data_checkout_cart.append('ukuran_k_val', document.getElementById('ukuran_value').value);
    data_checkout_cart.append('tipe_checkout', 'beli_langsung');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            beli_sekarang.style.display = 'none';
            loading_beli_sekarang.style.display = 'flex';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open("POST", "../../system/cart/checkout.php", true);
    xhttp.send(data_checkout_cart);
}

function click_varian_warna(key_warna_vp, value_warna_vp) {
    x_warna_vp = document.querySelectorAll(".c_id_varian_warna");
    for (i_x_warna_vp = 0; i_x_warna_vp < x_warna_vp.length; i_x_warna_vp++) {
        x_warna_vp[i_x_warna_vp].className = 'isi_box_select_varian c_id_varian_warna';
    }

    var add_id_varian_warna = 'id_varian_warna' + key_warna_vp;
    document.getElementById(add_id_varian_warna).className = 'isi_box_select_varian_active c_id_varian_warna';
    warna_value.value = value_warna_vp;
}

function click_varian_ukuran(key_ukuran_vp, value_ukuran_vp, value_harga_ukuran_vp, value_harga_ukuran_vp_send) {
    x_ukuran_vp = document.querySelectorAll(".c_id_varian_ukuran");
    for (i_x_ukuran_vp = 0; i_x_ukuran_vp < x_ukuran_vp.length; i_x_ukuran_vp++) {
        x_ukuran_vp[i_x_ukuran_vp].className = 'isi_box_select_varian c_id_varian_ukuran';
    }

    var add_id_varian_ukuran = 'id_varian_ukuran' + key_ukuran_vp;
    document.getElementById(add_id_varian_ukuran).className = 'isi_box_select_varian_active c_id_varian_ukuran';
    ukuran_value.value = value_ukuran_vp;
    var v_jumlah_produk = jumlah_produk.value;
    var ukuran_harga_value_var = value_harga_ukuran_vp * v_jumlah_produk;
    ukuran_harga_value.value = ukuran_harga_value_var;
    ukuran_harga_satuan_value.value = value_harga_ukuran_vp;
    harga_varian_produk.innerHTML = rubah(ukuran_harga_value_var);
    ukuran_harga_satuan_value_send.value = value_harga_ukuran_vp_send;
}

function view_addcart() {
    buvar_masukkan_keranjang.style.display = 'block';
    buvar_beli_sekarang.style.display = 'none';
    back_varian_produk.style.display = 'flex';
}

function view_checkout() {
    buvar_masukkan_keranjang.style.display = 'none';
    buvar_beli_sekarang.style.display = 'block';
    back_varian_produk.style.display = 'flex';
}

function close_back_varian_produk() {
    buvar_masukkan_keranjang.style.display = 'none';
    buvar_beli_sekarang.style.display = 'none';
    back_varian_produk.style.display = 'none';
}