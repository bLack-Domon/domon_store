<?php
include '../../config.php';

$search_value = $_POST['search_value'];

$search_kategori = $server->query("SELECT * FROM `kategori` WHERE `nama` LIKE '%$search_value%' ORDER BY `kategori`.`nama` ASC");
$cek_kategori = mysqli_num_rows($search_kategori);

if ($cek_kategori) {
    while ($data_search_kategori = mysqli_fetch_assoc($search_kategori)) {
?>
        <a href="<?php echo $url; ?>category/list/<?php echo $data_search_kategori['id']; ?>">
            <div class="hasil_search_header">
                <?php echo $data_search_kategori['nama']; ?>
            </div>
        </a>
        <?php
    }
} else {
    $search_iklan = $server->query("SELECT * FROM `iklan` WHERE `judul` LIKE '%$search_value%' ORDER BY `iklan`.`judul` ASC");
    $cek_iklan = mysqli_num_rows($search_iklan);
    if ($cek_iklan) {
        while ($data_search_iklan = mysqli_fetch_assoc($search_iklan)) {
        ?>
            <a href="<?php echo $url; ?>product/view/<?php echo $data_search_iklan['id']; ?>">
                <div class="hasil_search_header">
                    <?php echo $data_search_iklan['judul']; ?>
                </div>
            </a>
        <?php
        }
    } else {
        ?>
        <p class="hasil_search_header_0">Hasil pencarian tidak ditemukan.</p>
<?php
    }
}
?>
<style>
    .hasil_search_header {
        width: 100%;
        padding: 8px 20px;
        box-sizing: border-box;
        color: var(--black);
        font-size: 14px;
        transition: 0.2s;
    }

    .hasil_search_header:hover {
        background-color: var(--semi-grey);
    }

    .hasil_search_header_0 {
        color: var(--black);
        font-size: 14px;
        text-align: center;
        margin: 20px 0;
    }

    @media only screen and (max-width: 600px) {
        .hasil_search_header {
            font-size: 12px;
            padding: 8px 18px;
        }

        .hasil_search_header_0 {
            font-size: 12px;
        }
    }
</style>