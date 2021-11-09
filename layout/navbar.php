<?php
date_default_timezone_set("Asia/Jakarta");
include("../php_func/time_set.php");
if (session_status() == 0) {
    session_start();
}

$user =  isset($_SESSION['user']);
$login = null;
$logut = null;

?>
<style>
    ul {
        list-style-type: none;
        padding: 0;
    }

    .contain-all-nav {
        z-index: 2;
    }
</style>

<script src="../js/current_time.js"></script>
<script>
    function dsply() {
        var x = document.getElementById("main-nav");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    $(window).scroll(function() {
        var nv = document.getElementsByClassName("ctn-brnd");
        // console.log(window.scrollY);
        var scr = window.scrollY;
        if (scr >= 99 || scr >= 270) {
            $(nv).addClass("brand-handler");
            $(".ctn-nvb").addClass("fixed-top");
        }
        if (scrollY <= 94) {
            $(nv).removeClass("brand-handler");
            $(".ctn-nvb").removeClass("fixed-top");
        }
    });
    // window.onscroll = function() {
    //     breaker();
    // }
</script>

<div class="px-3 py-2 text-white contain-all-nav" style="background-color: #47c26c;">
    <div class="container-fluid ctn-brnd " style="border-bottom: 0.1px solid grey;">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-12">
                <h2 style="font-family: 'Segoe UI';letter-spacing: 3px;text-decoration: none;font-weight: normal;">
                    Puskesmas Securai
                </h2>
                <h6 style="font-family: 'Segoe UI';letter-spacing: 3px;text-decoration: none;font-weight: normal;">
                    Anda Sehat, Kami Bahagia
                </h6>
            </div>
            <div class="col-lg-6 col-md-5 col-12">
                <ul class="top-contact" style="max-height: 70px;">
                    <!-- <a class="logos ms-3 me-3 mt-1 mb-1"><img id="tp-img" src="../file/img/default_src/pkm-senen-dinkes.png" alt=""></a>
                    <a class="logos ms-3 me-3 mt-1 mb-1"><img id="tp-img" src="../file/img/default_src/pkm-senen-husada.png" alt=""></a> -->
                    <a class="logos ms-3 me-3 mt-1 mb-1"><img id="tp-img" style="border-radius: 8px;" src="../file/img/default_src/kop.png" width="70" height="70" alt=""></a>
                </ul>
            </div>
        </div>

    </div>
    <div class="container ctn-nvb " style="background-color: #47c26c;">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start " id="mn-container">
            <a class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <h6 class="mt-1">
                    <strong>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="26" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                        </svg>
                    </strong>
                </h6>
                <h6 class="main-time ms-2" style="font-family: 'Segoe UI';letter-spacing: 3px;text-decoration: none;font-weight: normal;">
                    <!-- filled by jquery current_time.js -->
                </h6>
            </a>
            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small" id="main-nav">
                <li>
                    <h5 id="nv-btn" class="nav-link nv-btn profile">
                        <?php
                        if (session_status() == 0) {
                            session_start();
                        }

                        if (isset($_SESSION['user'])) {
                            echo
                            $_SESSION['user'];
                            $login = "hidden";
                            $logout = "";
                            $tanya = "hidden";
                            $jwbq = "";
                            $artc = "";
                        } else {
                            $login = "";
                            $logout = "hidden";
                            $tanya = "";
                            $jwbq = "hidden";
                            $artc = "hidden";
                        }
                        ?>
                    </h5>
                </li>
                <li>
                    <a href="../index.php" id="nv-btn" class="nav-link nv-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="dd-lay">
                        <a id="nv-btn" class="nav-link nv-btn lay dd-mn">
                            Layanan
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        </a>
                        <ul class="dd-content">
                            <li class="dd-li"><a class="p-3" id="a-dd" href="../pages/cs.php">Unit Pelayanan</a></li>
                            <li <?= $artc; ?> class="dd-li"><a class="p-3" id="a-dd" href="../pages/article_input.php">Article Input</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="dd-ttng">
                        <a id="nv-btn" class="nav-link nv-btn dd-mn">
                            Tentang Kami
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        </a>
                        <ul class="ttng-ul">
                            <li><a class="p-3" href="../pages/ukp.php">UKP</a></li>
                            <li><a class="p-3" href="../pages/ukm.php">UKM</a></li>
                            <li><a class="p-3" href="../pages/profile.php">Profile</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="../pages/contact.php" id="nv-btn" class="nav-link nv-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>
                        Hubungi Kami
                    </a>
                </li>
                <li>
                    <a href="../pages/ask_pg.php" id="nv-btn" <?= $tanya; ?> class="nav-link nv-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z" />
                        </svg>
                        Tanya Dokter
                    </a>
                </li>
                <li>
                    <a href="../pages/answer.php" id="nv-btn" <?= $jwbq; ?> class="nav-link nv-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z" />
                        </svg>
                        Jawab Pertanyaan
                    </a>
                </li>
                <li <?= $login; ?>>
                    <a href="../pages/login.php" id="nv-btn" class="nav-link nv-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                            <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                        </svg>
                        Signin
                    </a>
                </li>
                <li <?= $logout; ?>>
                    <a href="../pages/signout.php" id="nv-btn" class="nav-link nv-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                            <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                        </svg>
                        Signout
                    </a>
                </li>
            </ul>
        </div>
        <div class="icn-btn">
            <a class="icon" value="off" onclick="dsply()" style="width: 100%; text-align: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                </svg>
            </a>
        </div>
    </div>
</div>