<?php
require_once('../temp/source.php');
if (!isset($TPL)) {
    $TPL = new source();
    $TPL->title = "Input Article";
    $TPL->bodycontent = __FILE__;
    include "../layout/layout.php";
    exit;
}

if (session_status() == 0) {
    session_start();
}
$url = "http://localhost:8000/pages/article_input.php";
$_SESSION['url'] = $url;

include('../db/connect.php');
try {
    include('../db/connect.php');
    $qry = "SELECT id, title, des, tumbnail_pict, `article`.`article_type`, id_creator, create_at, 
    DATE_FORMAT(time_start,'%Y-%m-%dT%H:%i') AS tm_s,title,
    DATE_FORMAT(time_end,'%Y-%m-%dT%H:%i') AS tm_e FROM `article`";

    $ftc = $connect->query($qry);
    $result = $ftc->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    echo "Error at: " . $e;
}
?>
<script src="../js/artc.js"></script>

<div class="container">
    <center>
        <div class="row">
            <div class="col">
                <h2 class="mt-4">
                    New Article
                </h2>

                <div class="card mb-3">
                    <img src="" id="imgprev" class="card-img-top" alt="Your Picture">
                    <!-- <iframe class="card-img-top me-1 mb-2" class="yt-vd ms-2" id="ytprev" src="" style="display: none;" frameborder="0" ></iframe> -->
                    <form action="ins_artc.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Judul Article</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" required name="ttl_input" aria-describedby="emailHelp">
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" required name="des_in" id="floatingTextarea2" cols="86" rows="10" style="height: 100px;"></textarea>
                                <label for="floatingTextarea2">Deskripsi</label>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <div class="d-block">
                                    <label for="tm-s" class="form-label">Jadwal Mulai</label>
                                    <input type="datetime-local" class="ms-2" name="time_start" required id="tm-s" style="max-height: 35px; max-width: 185px;">
                                </div>
                                <div class="d-block mx-3">
                                    <label for="tm-e" class="form-label">Jadwal Mulai</label>
                                    <input type="datetime-local" class="ms-2" name="time_end" id="tm-e" required style="max-height: 35px;max-width: 185px;">
                                </div>
                            </div>
                            <hr>
                            <div style="display: block;">
                                <p>
                                    Tumbnail Type
                                </p>
                                <input type="radio" name="rad" id="rad" onchange="radio()" value="yt">
                                <label for="rad">Youtube Video</label>
                                <br>
                                <input type="radio" name="rad" id="rad" onchange="radio()" value="pict" checked>
                                <label for="rad">Picture</label>
                            </div>
                            <hr>
                            <div id="yt-env">
                                <label for="yt-vid">Youtube Source</label>
                                <input type="url" class="form-control" name="yt_in" id="yt-vd">
                            </div>

                            <div id="pct-env">
                                <label for="pict-in" class="form-label">Tumbnail Picture</label>
                                <input class="form-control" type="file" onchange="uppict(this)" id="pict-in" name="pictin" accept="image/png, image/jpeg">
                            </div>
                            <button type="submit" class="btn btn-outline mt-2 mb-1 sbm" name="submit" style="max-width: 100%;">
                                Submit Article
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <h2 class="mt-3">
                Update Article Data
            </h2>
            <?php foreach ($result as $res) : ?>
                <div class="col-sm-5 col-md-6 mt-4 ms-1 me-5" style="width: 100%;">
                    <div class="card mb-3" style="max-width: 100%;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php
                                if (strpos($res['tumbnail_pict'], '.jpg') || strpos($res['tumbnail_pict'], '.png')) {
                                    $pict_op = "";
                                    $yt_op = "hidden";
                                    $pict = "checked";
                                    $yt = "";
                                    $yt_t = "";
                                    $pict_t = $res['tumbnail_pict'];
                                    echo
                                    '<center>
                                    <img class="img-fluid rounded-start me-1 mb-2" src="../file/img/img_artc/' . $res['tumbnail_pict'] . '" style="max-width: 100%;max-height: 100%;" alt="" >
                                    </center>';
                                }
                                if (strpos($res['tumbnail_pict'], 'youtube')) {
                                    $pict_op = "hidden";
                                    $yt_op = "";
                                    $pict = "";
                                    $yt = "checked";
                                    $yt_t = $res['tumbnail_pict'];
                                    $pict_t = "";
                                    echo
                                    '<center>
                                    <iframe class="img-fluid rounded-start me-1 mb-2" class="yt-vd ms-2" src="' . $res['tumbnail_pict'] . '" style="max-width: 100%;max-height: 100%;" frameborder="0" ></iframe>
                                    </center>';
                                }
                                ?>
                            </div>
                            <div class="col-md-8">
                                <form action="dummy.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body artc">
                                        <div class="input-group mb-3 mt-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Judul Event</span>
                                            <input type="text" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-default" name="judul" value="<?= $res['title']; ?>" style="max-width: 100%;">
                                        </div>
                                        <div class="mb-3 form-check d-flex form-floating">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" required name="des" id="floatingTextarea2" cols="86" rows="10" style="height: 100px;"><?= $res['des']; ?></textarea>
                                                <label for="floatingTextarea2">Deskripsi</label>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="d-block">
                                                <label for="tm-s" class="form-label">Jadwal Mulai</label>
                                                <input type="datetime-local" class="ms-2" name="tm_s" id="tm-s" value="<?= $res['tm_s']; ?>" style="max-height: 35px; max-width: 185px;">
                                            </div>
                                            <div class="d-block mx-3">
                                                <label for="tm-e" class="form-label">Jadwal Mulai</label>
                                                <input type="datetime-local" class="ms-2" name="tm_e" id="tm-e" required value="<?= $res['tm_e']; ?>" style="max-height: 35px;max-width: 185px;">
                                            </div>

                                        </div>
                                        <hr>
                                        <div style="display: block;">
                                            <p>
                                                Tumbnail Type
                                            </p>
                                            <input type="radio" name="tumb" id="tumb<?= $res['id']; ?>" onchange="option<?= $res['id']; ?>()" value="yt" <?= $yt; ?>>
                                            <label for="tumb">Youtube Video</label>
                                            <br>
                                            <input type="radio" name="tumb" id="tumb<?= $res['id']; ?>" onchange="option<?= $res['id']; ?>()" value="pict" <?= $pict; ?>>
                                            <label for="tumb">Picture</label>
                                        </div>
                                        <hr>
                                        <div id="yt-cont<?= $res['id']; ?>">
                                            <label for="yt-vid">Youtube Source</label>
                                            <input type="url" class="form-control" name="yt" id="yt-vid" value="<?= $yt_t; ?>">
                                        </div>

                                        <div id="pct-cont<?= $res['id']; ?>">
                                            <label for="formFile" class="form-label">Tumbnail Picture</label>
                                            <input class="form-control" type="file" id="formFile" name="pict" accept="image/png, image/jpeg" value="<?= $pict_t; ?>">
                                        </div>
                                        <button type="submit" class="btn btn-outline mt-2 mb-1 sbm" name="id" value="<?= $res['id']; ?>" style="max-width: 100%;">Submit Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        opt<?= $res['id']; ?>();
                    });

                    function option<?= $res['id']; ?>() {
                        var rad = document.querySelectorAll('[id="tumb<?= $res['id']; ?>"]');

                        for (rd of rad) {
                            console.log(rd.value);
                            if (rd.checked) {
                                if (rd.value == "yt") {
                                    document.getElementById("yt-cont<?= $res['id']; ?>").style.visibility = "visible";
                                    document.getElementById("pct-cont<?= $res['id']; ?>").style.visibility = "hidden";
                                    document.getElementById("yt-cont<?= $res['id']; ?>").style.display = "block";
                                    document.getElementById("pct-cont<?= $res['id']; ?>").style.display = "none";
                                    // break;
                                }
                                if (rd.value == "pict") {
                                    document.getElementById("yt-cont<?= $res['id']; ?>").style.visibility = "hidden";
                                    document.getElementById("pct-cont<?= $res['id']; ?>").style.visibility = "visible";
                                    document.getElementById("yt-cont<?= $res['id']; ?>").style.display = "none";
                                    document.getElementById("pct-cont<?= $res['id']; ?>").style.display = "block";
                                    // break;
                                }
                                break;
                            }
                        }
                        return;
                    }

                    function opt<?= $res['id']; ?>() {
                        var rad = document.querySelectorAll('[id="tumb<?= $res['id']; ?>"]');

                        for (rd of rad) {
                            console.log(rd.value);
                            if (rd.checked) {
                                if (rd.value == "yt") {
                                    document.getElementById("yt-cont<?= $res['id']; ?>").style.display = "block";
                                    document.getElementById("pct-cont<?= $res['id']; ?>").style.display = "none";
                                    // break;
                                }
                                if (rd.value == "pict") {
                                    document.getElementById("yt-cont<?= $res['id']; ?>").style.display = "none";
                                    document.getElementById("pct-cont<?= $res['id']; ?>").style.display = "block";
                                    // break;
                                }
                                break;
                            }
                        }
                        return;
                    }
                </script>
            <?php endforeach; ?>
        </div>
    </center>
</div>