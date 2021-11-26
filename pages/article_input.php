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
    DATE_FORMAT(time_end,'%Y-%m-%dT%H:%i') AS tm_e FROM `article` WHERE is_deleted = 0 ORDER BY create_at DESC;";

    $ftc = $connect->query($qry);
    $result = $ftc->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    echo "Error at: " . $e;
}
if (empty($_SESSION['user'])) {
    $cont = "hidden";
} else {
    $cont = "";
}
?>
<script src="../js/artc.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->

<div class="container" <?= $cont; ?>>
    <center>
        <?php
        if (strpos(isset($_SESSION['art_up']), "Update Succes")) {
            echo '
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>
        <div class="alert alert-success mt-3 d-flex align-items-center" role="alert" style="max-width: fit-content;">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            ' . $_SESSION['art_up'] . '
        </div>
            <button type="button" class="btn-close justify-self-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
        }
        if (strpos(isset($_SESSION['art_up']), "Update Filed")) {
            echo '
        <div class="alert alert-danger mt-3 d-flex align-items-center" role="alert" style="max-width: fit-content;">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
          ' . $_SESSION['art_up'] . '
        </div>
        <button type="button" class="btn-close justify-self-end" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
        if (strpos(isset($_SESSION['art_up']), "Delete Succes")) {
            echo '
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>
        <div class="alert alert-success mt-3 d-flex align-items-center" role="alert" style="max-width: fit-content;">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            ' . $_SESSION['art_up'] . '
        </div>
            <button type="button" class="btn-close justify-self-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
        }
        if (strpos(isset($_SESSION['nw_artc']), "Succes")) {
            echo '
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>
        <div class="alert alert-success mt-3 d-flex align-items-center" role="alert" style="max-width: fit-content;">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            ' . $_SESSION['nw_artc'] . '
        </div>
            <button type="button" class="btn-close justify-self-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
        }
        if (strpos(isset($_SESSION['nw_artc']), "Fail")) {
            echo '
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>
        <div class="alert alert-success mt-3 d-flex align-items-center" role="alert" style="max-width: fit-content;">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            ' . $_SESSION['nw_artc'] . '
        </div>
            <button type="button" class="btn-close justify-self-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
        }
        unset($_SESSION['art_up']);
        unset($_SESSION['nw_artc']);
        ?>

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
                            <div style="display: inline-flex;">
                                <div class="p-5" style="display: block;">
                                    <h5 style="color: black;">
                                        Tumbnail Type
                                    </h5>
                                    <br>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="rad" id="rad" onchange="radio()" role="switch" value="yt">
                                            Youtube Video
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" role="switch" name="rad" id="rad" onchange="radio()" value="pict" checked>
                                            Picture
                                        </label>
                                    </div>
                                </div>
                                <div class="p-5" style="border-left: 0.5px solid grey;">
                                    <div class="h5">
                                        Article Type
                                    </div>
                                    <br>
                                    <div style="display: block;max-width: 371px;">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" role="switch" name="tipe" id="tipe" value="1" checked>
                                                Default
                                            </label>
                                        </div>
                                        <br>
                                        <div class="form-check form-switch">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" role="switch" name="tipe" id="tipe" value="2">
                                                UKP
                                            </label>
                                        </div>
                                        <br>
                                        <div class="form-check form-switch">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" role="switch" name="tipe" id="tipe" value="3">
                                                UKM
                                            </label>
                                        </div>
                                    </div>
                                </div>
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
            <?php
            foreach ($result as $res) : ?>
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
                                    <img class="img-fluid rounded-start me-1 mb-2" src="../file/img/img_artc/' . $res['tumbnail_pict'] . '" alt="" >
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
                                    <iframe class="img-fluid rounded-start me-1 mb-2" class="yt-vd ms-2" src="' . $res['tumbnail_pict'] . '" frameborder="0" ></iframe>
                                    </center>';
                            }
                            if ($res['article_type'] == '1') {
                                $tiped = "checked";
                                $tipep = "";
                                $tipem = "";
                            }
                            if ($res['article_type'] == '2') {
                                $tiped = "";
                                $tipep = "checked";
                                $tipem = "";
                            }
                            if ($res['article_type'] == '3') {
                                $tiped = "";
                                $tipep = "";
                                $tipem = "checked";
                            }
                            ?>
                            <br>
                            <form action="dummy.php" method="POST" enctype="multipart/form-data">
                                <div class="h5">
                                    Article Type
                                </div>
                                <br>
                                <div style="display: block;max-width: 371px;">
                                    <div class="form-check form-switch">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" role="switch" name="tipe" id="tipe" value="1" <?= $tiped; ?>>
                                            Default
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" role="switch" name="tipe" id="tipe" value="2" <?= $tipep; ?>>
                                            UKP
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" role="switch" name="tipe" id="tipe" value="3" <?= $tipem; ?>>
                                            UKM
                                        </label>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
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
                                        <div class="form-check form-switch">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" role="switch" name="tumb" id="tumb<?= $res['id']; ?>" onchange="option<?= $res['id']; ?>()" value="yt" <?= $yt; ?>>
                                                Youtube Video
                                            </label>
                                        </div>
                                        <br>
                                        <div class="form-check form-switch">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" role="switch" name="tumb" id="tumb<?= $res['id']; ?>" onchange="option<?= $res['id']; ?>()" value="pict" <?= $pict; ?>>
                                                Picture
                                            </label>
                                        </div>
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
                                    <a class="btn btn-outline-danger mt-2 mb-1" onclick="del<?= $res['id']; ?>()" style="width: 100%;">
                                        Delete Article
                                    </a>
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

                    function del<?= $res['id']; ?>() {
                        var answer = confirm("You wish to delete this event?")
                        if (answer) {
                            window.location = "delete_art.php?id=<?= $res['id']; ?>";
                        } else {
                            alert("Your Event is Not Deleted");
                        }
                    }

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
    </center>
</div>