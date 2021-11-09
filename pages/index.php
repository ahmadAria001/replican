<?php
// data container
require_once('../temp/source.php');

if (session_status() == 0) {
    session_start();
}


if (!isset($TPL)) {
    $TPL = new source();
    $TPL->title = "Home";
    $TPL->bodycontent = __FILE__;
    include "../layout/layout.php";
    exit;
}
try {
    include('../db/connect.php');
    $qry = "SELECT * FROM article WHERE article_type = '1' ORDER BY create_at DESC";
    $ftc = $connect->query($qry);
    $rst = $ftc->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    echo "Error at: " + $e;
}

?>

<style>
    :root {
        --bd: 1.5em;
    }

    .wlcm-txt {
        font-family: 'Segoe UI';
        color: white;
        /* background: rgb(21, 17, 116);
        background: linear-gradient(0deg, rgba(21, 17, 116, 1) 0%, rgba(228, 255, 252, 1) 100%); */
    }

    .xct {
        /* border: solid var(--bd) rgba(#000, .03); */
        background: rgb(2, 0, 36);
        background: linear-gradient(0deg, rgba(2, 0, 36, 1) 0%, rgba(1, 40, 167, 1) 58%, rgba(179, 186, 187, 1) 100%);
        max-height: fit-content;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col xct">
            <div class="wlcm-txt p-3" align="center">
                <img class="mt-5 mb-1" src="../file/img/default_src/Foto bersama.jpg" style="width: 100%; height: 50%;">
                <h2>Selamat datang di website Puskemas Securai</h2>
                <p>
                    Website ini dibuat untuk mengenalkan Puskesmas Kecamatan Senen kepada masyarakat luas.
                    Berisi berbagai macam informasi terkait baik pelayanan maupun kegiatan yang ada di Puskesmas Securai.
                    <br>
                    <br>
                    Pengunjung website ini juga dapat menggunakan fitur TANYA DOKTER untuk mengetahui informasi terkait dengan penyakit, tindakan dan pengobatan tanpa perlu bertemu dokter secara langsung.
                    Kami akan usahakan membalas pertanyaan anda secepat mungkin.
                    <br>
                    <br>
                    Kami harapkan anda bersedia menghubungi kami baik melalui telepon, email, maupun formulir kontak pada halaman Hubungi Kami untuk memberikan masukan-masukan demi pengembangan pada pelayanan kami. Terima kasih. ANDA SEHAT, KAMI PUAS!
                </p>
            </div>
        </div>
        <center class="mt-2">
            <h3 style="font-family: 'Segoe UI';">
                Article
            </h3>
        </center>
        <hr class="mt-3 mb-3" style="border: solid 1px #fff;">
        <?php foreach ($rst as $res) : ?>
            <div class="row mt-2" style="font-family: 'Segoe UI';">
                <div class="col">
                    <?php
                    if (strpos($res['tumbnail_pict'], '.jpg') || strpos($res['tumbnail_pict'], '.png')) {
                        echo
                        '<img align="right" src="../file/img/img_artc/' . $res['tumbnail_pict'] . '" alt="" style="max-heigh: 250;max-width: 350;border-radius: 5px;">';
                    }
                    if (strpos($res['tumbnail_pict'], 'youtube')) {
                        echo
                        '<iframe align="right" class="yt-vd ms-2" src="' . $res['tumbnail_pict'] . '" frameborder="0" width="350" height="250" style="border-radius: 5px;"></iframe>';
                    } else {
                    }
                    ?>
                    <h3 style="text-align: right;">
                        <?= $res['title']; ?>
                    </h3>
                    <div class="d-flex justify-content-end">
                        <hr style="border: 4px solid #fff; width: 150; border-radius: 8px;">
                    </div>
                    <div class="shrt-desc">
                        <h6 style="text-align: end; color: white;">
                            <?= $res['des']; ?>
                        </h6>
                        <p align="right" style="color: rgb(129, 129, 129);font-size: 15px;">
                            <?= $res['time_start']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <hr class="mt-2 mb-2" style="border: #fff 1px solid;">
        <?php endforeach; ?>
    </div>
</div>