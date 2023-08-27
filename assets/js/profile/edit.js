function click_file_img() {
    cfile_img_pro.click();
}

function change_image(event) {
    const file = document.getElementById('cfile_img_pro').files[0];
    const fileType = file['type'];
    const validImageTypes = ['image/jpeg', 'image/png'];
    if (!validImageTypes.includes(fileType)) {
        err_foto_pro.style.display = 'block';
        cfile_img_pro.value = '';
    } else {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('img_foto_pro');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
        err_foto_pro.style.display = 'none';
    }
}

function simpan_edit_profile() {
    if (nama_lengkap.value == '') {
        p_nama_lengkap.style.color = '#EA2027';
        nama_lengkap.style.border = '1px solid #EA2027';
    } else {
        p_nama_lengkap.style.color = '#959595';
        nama_lengkap.style.border = '1px solid #e2e2e2';
    }
    if (no_wa.value == '') {
        p_no_wa.style.color = '#EA2027';
        no_wa.style.border = '1px solid #EA2027';
    } else {
        p_no_wa.style.color = '#959595';
        no_wa.style.border = '1px solid #e2e2e2';
    }
    if (nama_lengkap.value && no_wa.value) {
        var data_edit_profile = new FormData();
        data_edit_profile.append('cfile_img_pro', document.getElementById('cfile_img_pro').files[0]);
        data_edit_profile.append('nama_lengkap', document.getElementById('nama_lengkap').value);
        data_edit_profile.append('no_wa', document.getElementById('no_wa').value);
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
        xhttp.open('POST', '../system/profile/edit.php', true);
        xhttp.send(data_edit_profile);
    }
}