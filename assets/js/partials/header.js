function SearchHeader(url_global) {
    if (search_header.value) {
        var url_search_global = url_global + 'system/search/list.php';
        res_search_header.style.display = 'block';
        var data_search = new FormData();
        data_search.append('search_value', document.getElementById('search_header').value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 1) {
                loading_res_search_header.style.display = 'block';
                isi_res_search_header.style.display = 'none';
            }
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('isi_res_search_header').innerHTML = this.responseText;
                loading_res_search_header.style.display = 'none';
                isi_res_search_header.style.display = 'block';
                var getscriptres = document.getElementsByTagName('script');
                for (var i = 0; i < getscriptres.length - 0; i++) {
                    if (getscriptres[i + 0].text != null) eval(getscriptres[i + 0].text);
                }
            }
        }
        xhttp.open("POST", url_search_global, true);
        xhttp.send(data_search);
    } else {
        res_search_header.style.display = 'none';
    }
}