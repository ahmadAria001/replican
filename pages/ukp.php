<?php
// data container
require_once('../temp/source.php');

if (session_status() == 0) {
    session_start();
}


if (!isset($TPL)) {
    $TPL = new source();
    $TPL->title = "UKP";
    $TPL->bodycontent = __FILE__;
    include "../layout/layout.php";
    exit;
}
try {
    include('../db/connect.php');
    $qry = "SELECT * FROM article WHERE article_type = '2' ORDER BY create_at DESC";
    $ftc = $connect->query($qry);
    $rst = $ftc->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    echo "Error at: " + $e;
}
?>

<style>
    #hr-main {
        background-clip: padding-box;
        animation-name: underline;
        animation-duration: 3s;
        animation-timing-function: ease-in-out;
        animation-delay: 0;
        animation-iteration-count: infinite;
        animation-fill-mode: both;
        animation-direction: normal;
        animation-play-state: running;
    }

    @keyframes underline {
        0% {
            width: 1%;
        }

        /* 25% {
            width: 50%;
        } */

        50% {
            width: 100%;
        }

        /* 75% {
            width: 50%;
        } */

        100% {
            width: 1%;
        }
    }
</style>

<div class="container mt-5">
    <div class="mb-4" style="color: white;">
        <center>
            <h3>Upaya Kesehatan Perorangan</h3>
            <br>
            <p>UKP adalah suatu kegiatan dan atau serangkaian kegiatan pelayanan kesehatan yang ditujukan</p>
            <p>untuk peningkatan, pencegahan, penyembuhan penyakit, pengurangan penderitaan akibat</p>
            <p>penyakit dan memulihkan kesehatan perorangan.</p>
        </center>
    </div>
    <div class="row mt-4">
        <div class="col">
            <center>
                <h3>
                    Dokumentasi UKP
                    <hr id="hr-main" style="max-width: 27%;">
                </h3>
            </center>
            <?php foreach ($rst as $res) : ?>
                <div class="card mb-3">
                    <?php
                    if (strpos($res['tumbnail_pict'], '.jpg') || strpos($res['tumbnail_pict'], '.png')) {
                        $pict_t = $res['tumbnail_pict'];
                        echo
                        '<center>
                            <img class="card-img-top" src="../file/img/img_artc/' . $res['tumbnail_pict'] . '" alt="" >
                        </center>';
                    }
                    if (strpos($res['tumbnail_pict'], 'youtube')) {
                        $yt_t = $res['tumbnail_pict'];
                        echo
                        '<center>
                            <iframe class="card-img-top me-1 mb-2" class="card-img yt-vd ms-2" src="' . $res['tumbnail_pict'] . '" frameborder="0" ></iframe>
                            </center>';
                    }
                    ?>
                    <div class="card-body">
                        <h3 class="card-title" style="color: black;">
                            <?= $res['title']; ?>
                        </h3>
                        <p class="card-text">
                            Description:
                            <?= $res['des']; ?>
                        </p>
                        <p class="card-text">
                            Waktu Mulai: <?= $res['time_start']; ?>
                        </p>
                        <p class="card-text">
                            Waktu Berakhir: <?= $res['time_end']; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>