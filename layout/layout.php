</html>
<!doctype html>
<html lang="en">

<head>
    <!-- data source -->
    <?php
    require_once('../temp/source.php');
    date_default_timezone_set("Asia/Jakarta");
    session_start();
    ?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="../GUI/header_ui.css">
    <link rel="stylesheet" href="../GUI/content_ui.css">
    <link rel="shortcut icon" href="medic.ico" type="image/x-icon">

    <!-- Custom JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>
        <?php if (isset($TPL->title)) {
            echo $TPL->title;
        } ?>
        | Puskesmas Securai
    </title>
    <?php
    // if (isset($TPL->headcontent)) {
    //     include $TPL->headcontent;
    // } 
    ?>
</head>

<body>
    <div class="container-fluid" style="padding: 0; margin-bottom: 50px;">
        <?php
        include('navbar.php');
        if (isset($TPL->bodycontent)) {
            include $TPL->bodycontent;
        }
        ?>
    </div>
    <footer class="mt-5" style="max-width: 100%;background-color: #47c26c;">
        <center>
            <div class="row" style="max-width: 90%;">
                <div class="col ms-5 mt-2" style="max-width: 250px;text-align: center;">
                    <h5>
                        Jadwal Pelayanan
                    </h5>
                    <hr style="border: 1px solid white;">
                    <p style="color: white;">
                        Senin - KAMIS
                        <br>
                        08.00 - 14.00
                        <br>
                        JUMAT 08:00 - 13:00
                        <br>
                        SABTU 08:00 - 13:00
                        <br>
                        Hari Libur UGD 24JAM
                    </p>
                </div>
                <div class="col ms-5 mt-2" style="max-width: 250pxl;text-align: center;">
                    <h5>
                        Lokasi
                    </h5>
                    <hr style="border: 1px solid white;">
                    <p style="color: white;">
                        Kec.Babalan
                        <br>
                        Kab.Langkat
                    </p>
                </div>
                <div class="col ms-5 mt-2" style="max-width: 250pxl;text-align: center;">
                    <h5>
                        Kunjungi Kami
                    </h5>
                    <hr style="border: 1px solid white;">
                    <p>
                        <a href="https://web.facebook.com/puskesmas.securai" style="color: white;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </a>
                        <a href="" class="ms-3" hidden style="color: white;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                            </svg>
                        </a>
                        <a class="ms-3" href="mailto:securaipkm@gmail.com" style="color: white;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                            </svg>
                        </a>
                    </p>
                </div>
                <div class="col ms-5 mt-2" style="max-width: 250pxl;text-align: center;">
                    <h5>
                        Tentang Kami
                    </h5>
                    <hr style="border: 1px solid white;">
                    <p style="color: white;">
                        Saat ini Puskesmas Securai dikepalai oleh dr. Savitri Wardhani Tungga Dewi.
                        Beliau menjabat sejak Maret 2020 sampai dengan saat ini.
                        Dibawah kepemimpinan beliau Puskesmas Securai banyak melakukan inovasi pelayanan guna terpenuhinya kebutuhan kesehatan pasien.
                    </p>
                </div>
            </div>
        </center>
        <div class="row" style="max-width: 25%;margin-left: 40%;">
            <p style="color: white;">
                © Copyright 2021 | All Rights Reserved
            </p>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    -->
</body>

</html>