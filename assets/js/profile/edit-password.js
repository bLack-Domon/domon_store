function simpan_edit_password() {
    if (password_lama.value == '') {
        p_password_lama.style.color = '#EA2027';
        password_lama.style.border = '1px solid #EA2027';
    } else {
        p_password_lama.style.color = '#959595';
        password_lama.style.border = '1px solid #e2e2e2';
    }
    if (password_baru.value == '') {
        p_password_baru.style.color = '#EA2027';
        password_baru.style.border = '1px solid #EA2027';
    } else if (password_baru.value.length < 6) {
        p_password_baru.style.color = '#EA2027';
        password_baru.style.border = '1px solid #EA2027';
        p_password_baru.innerHTML = 'Password Terlalu Pendek';
    } else {
        p_password_baru.style.color = '#959595';
        password_baru.style.border = '1px solid #e2e2e2';
        p_password_baru.innerHTML = 'Password Baru';
    }
    if (password_lama.value && password_baru.value && password_baru.value.length > 5) {
        var data_edit_password = new FormData();
        data_edit_password.append('password_lama', document.getElementById('password_lama').value);
        data_edit_password.append('password_baru', document.getElementById('password_baru').value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                bu_e_pro.style.display = 'none';
                loading_e_pro.style.display = 'flex';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('res').innerHTML = this.responseText;
                bu_e_pro.style.display = 'flex';
                loading_e_pro.style.display = 'none';
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open('POST', '../system/profile/edit-password.php', true);
        xhttp.send(data_edit_password);
    }
}

function kembali_ke_edit() {
    window.location.href = 'edit';
}