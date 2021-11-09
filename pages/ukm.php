<?php
// data container
require_once('../temp/source.php');

if (session_status() == 0) {
    session_start();
}


if (!isset($TPL)) {
    $TPL = new source();
    $TPL->title = "UKM";
    $TPL->bodycontent = __FILE__;
    include "../layout/layout.php";
    exit;
}
try {
    include('../db/connect.php');
    $qry = "SELECT * FROM article WHERE article_type = '3' ORDER BY create_at DESC";
    $ftc = $connect->query($qry);
    $rst = $ftc->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    echo "Error at: " + $e;
}
?>

<style>
    #hr-main {
        animation-name: underline;
        animation-duration: 4s;
        animation-timing-function: ease-in-out;
        animation-delay: 0;
        animation-iteration-count: infinite;
        animation-fill-mode: none;
        animation-direction: alternate-reverse;
        animation-play-state: running;
    }

    @keyframes underline {
        0% {
            width: 0%;
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
            width: 0%;
        }
    }
</style>

<div class="container mt-3">
    <center>
        <div class="mb-3" style="color: white;">
            <h3> Unit Kesehatan Masyarakat</h3>
            <br>
            <p>Upaya Kesehatan Masyarakat yang selanjutnya disingkat UKM</p>
            <p>adalah setiap kegiatan untuk memelihara dan meningkatkan kesehatan serta mencegah dan</p>
            <p>menanggulangi timbulnya masalah kesehatan dengan sasaran keluarga, kelompok, dan masyarakat.</p>
        </div>
    </center>
    <div class="row mt-3 g-3">
        <center>
            <h3>
                Dokumentasi UKM
                <hr id="hr-main" style="max-width: 27%;">
            </h3>
        </center>
        <?php foreach ($rst as $res) : ?>
            <div class="col">
                <div class="card mt-4" style="width: 18rem;height: 100%;">
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
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h5 class="card-title" style="color: black;"><?= $res['title']; ?></h5>
                        <p class="card-text">
                            <?= $res['des']; ?>
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Time</li>
                        <li class="list-group-item"><?= $res['time_start']; ?></li>
                        <li class="list-group-item"><?= $res['time_end']; ?></li>
                    </ul>
                    <!-- <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div> -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>