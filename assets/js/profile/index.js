const GetOrder = (url) => {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 1) {
            loading_order_menu.style.display = 'grid';
            res_order_menu.style.display = 'none';
        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('res_order_menu').innerHTML = this.responseText;
            loading_order_menu.style.display = 'none';
            res_order_menu.style.display = 'block';
            var getscriptres = document.getElementsByTagName('script');
            for (var i = 0; i < getscriptres.length - 0; i++) {
                if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
            }
        }
    }
    xhttp.open('POST', url, true);
    xhttp.send();
}

window.onload = function () {
    GetOrder('../system/order/belum-bayar.php');
}

belum_bayar.onclick = function () {
    belum_bayar.className = 'isi_select_order_menu_active';
    dikemas.className = 'isi_select_order_menu';
    dikirim.className = 'isi_select_order_menu';
    selesai.className = 'isi_select_order_menu';
    dibatalkan.className = 'isi_select_order_menu';
    GetOrder('../system/order/belum-bayar.php');
}

dikemas.onclick = function () {
    belum_bayar.className = 'isi_select_order_menu';
    dikemas.className = 'isi_select_order_menu_active';
    dikirim.className = 'isi_select_order_menu';
    selesai.className = 'isi_select_order_menu';
    dibatalkan.className = 'isi_select_order_menu';
    GetOrder('../system/order/dikemas.php');
}

dikirim.onclick = function () {
    belum_bayar.className = 'isi_select_order_menu';
    dikemas.className = 'isi_select_order_menu';
    dikirim.className = 'isi_select_order_menu_active';
    selesai.className = 'isi_select_order_menu';
    dibatalkan.className = 'isi_select_order_menu';
    GetOrder('../system/order/dikirim.php');
}

selesai.onclick = function () {
    belum_bayar.className = 'isi_select_order_menu';
    dikemas.className = 'isi_select_order_menu';
    dikirim.className = 'isi_select_order_menu';
    selesai.className = 'isi_select_order_menu_active';
    dibatalkan.className = 'isi_select_order_menu';
    GetOrder('../system/order/selesai.php');
}

dibatalkan.onclick = function () {
    belum_bayar.className = 'isi_select_order_menu';
    dikemas.className = 'isi_select_order_menu';
    dikirim.className = 'isi_select_order_menu';
    selesai.className = 'isi_select_order_menu';
    dibatalkan.className = 'isi_select_order_menu_active';
    GetOrder('../system/order/dibatalkan.php');
}

c_mo_belum_bayar.onclick = function () {
    user_info.style.display = 'none';
    order_menu.style.display = 'block';
    belum_bayar.onclick();
}

c_mo_dikemas.onclick = function () {
    user_info.style.display = 'none';
    order_menu.style.display = 'block';
    dikemas.onclick();
}

c_mo_dikirim.onclick = function () {
    user_info.style.display = 'none';
    order_menu.style.display = 'block';
    dikirim.onclick();
}

c_mo_selesai.onclick = function () {
    user_info.style.display = 'none';
    order_menu.style.display = 'block';
    selesai.onclick();
}

close_order_menu.onclick = function () {
    user_info.style.display = 'block';
    order_menu.style.display = 'none';
}

star_c1.onclick = function () {
    star_c1.style.color = '#ff6348';
    star_c2.style.color = '#e2e2e2';
    star_c3.style.color = '#e2e2e2';
    star_c4.style.color = '#e2e2e2';
    star_c5.style.color = '#e2e2e2';
    star_bp_inp.value = '1';
}

star_c2.onclick = function () {
    star_c1.style.color = '#ff6348';
    star_c2.style.color = '#ff6348';
    star_c3.style.color = '#e2e2e2';
    star_c4.style.color = '#e2e2e2';
    star_c5.style.color = '#e2e2e2';
    star_bp_inp.value = '2';
}

star_c3.onclick = function () {
    star_c1.style.color = '#ff6348';
    star_c2.style.color = '#ff6348';
    star_c3.style.color = '#ff6348';
    star_c4.style.color = '#e2e2e2';
    star_c5.style.color = '#e2e2e2';
    star_bp_inp.value = '3';
}

star_c4.onclick = function () {
    star_c1.style.color = '#ff6348';
    star_c2.style.color = '#ff6348';
    star_c3.style.color = '#ff6348';
    star_c4.style.color = '#ff6348';
    star_c5.style.color = '#e2e2e2';
    star_bp_inp.value = '4';
}

star_c5.onclick = function () {
    star_c1.style.color = '#ff6348';
    star_c2.style.color = '#ff6348';
    star_c3.style.color = '#ff6348';
    star_c4.style.color = '#ff6348';
    star_c5.style.color = '#ff6348';
    star_bp_inp.value = '5';
}

function show_bp(idinvbp) {
    box_bp_produk.style.display = 'flex';
    id_inv_bp.value = idinvbp;
}

function close_bp() {
    box_bp_produk.style.display = 'none';
    id_inv_bp.value = '';
    star_c1.style.color = '#e2e2e2';
    star_c2.style.color = '#e2e2e2';
    star_c3.style.color = '#e2e2e2';
    star_c4.style.color = '#e2e2e2';
    star_c5.style.color = '#e2e2e2';
    star_bp_inp.value = '';
}

function kirim_penilaian_bp() {
    if (star_bp_inp.value == '') {
        bpld_red.style.display = 'block';
    } else {
        bpld_red.style.display = 'none';
        var data_bp = new FormData();
        data_bp.append('star_bp_inp', document.getElementById('star_bp_inp').value);
        data_bp.append('deskripsi_bp_inp', document.getElementById('deskripsi_bp_inp').value);
        data_bp.append('id_inv_bp', document.getElementById('id_inv_bp').value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                t_bp_send.style.display = 'none';
                load_bp_send.style.display = 'block';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('res').innerHTML = this.responseText;
                t_bp_send.style.display = 'block';
                load_bp_send.style.display = 'none';
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open('POST', '../system/profile/beri-nilai.php', true);
        xhttp.send(data_bp);
    }
}