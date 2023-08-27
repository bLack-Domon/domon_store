function checkout(id_product_cko) {
    var btn_cko = 'button_checkout' + id_product_cko;
    var load_cko = 'loading_checkout' + id_product_cko;

    var data_checkout_cart = new FormData();
    data_checkout_cart.append('id_product', id_product_cko);
    data_checkout_cart.append('tipe_checkout', 'keranjang');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            document.getElementById(btn_cko).style.display = 'none';
            document.getElementById(load_cko).style.display = 'flex';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            document.getElementById(btn_cko).style.display = 'flex';
            document.getElementById(load_cko).style.display = 'none';
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open("POST", "../system/cart/checkout.php", true);
    xhttp.send(data_checkout_cart);
}

function removecart(id_product) {
    var r_isi_cart = 'isi_cart' + id_product;
    var r_icon_cart = 'icon_remove_cart' + id_product;
    var r_loading_cart = 'loading_remove_cart' + id_product;

    var data_remove_cart = new FormData();
    data_remove_cart.append('id_product', id_product);
    data_remove_cart.append('page_product', 'cart');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            document.getElementById(r_icon_cart).style.display = 'none';
            document.getElementById(r_loading_cart).style.display = 'block';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res').innerHTML = this.responseText;
            document.getElementById(r_icon_cart).style.display = 'block';
            document.getElementById(r_loading_cart).style.display = 'none';
            document.getElementById(r_isi_cart).style.display = 'none';
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open("POST", "../system/cart/remove.php", true);
    xhttp.send(data_remove_cart);
}