<?php
require_once('../temp/source.php');
if (!isset($TPL)) {
    $TPL = new source();
    $TPL->title = "Unit Pelayanan";
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
    DATE_FORMAT(time_end,'%Y-%m-%dT%H:%i') AS tm_e FROM `article` ORDER BY create_at DESC;";

    $ftc = $connect->query($qry);
    $result = $ftc->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    echo "Error at: " . $e;
}
?>
<style>
    #fnt-ttl {
        font-size: 20px;
    }

    #svg {
        color: black;
    }
</style>

<div class="container mt-5">
    <center>
        <div class="accordion" id="accordionExample" style="border-color: #47c26c;z-index: -1;">
            <div class="accordion-item" style="background-color: whitesmoke; color: black;border-color: #47c26c;">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color: #47c26c;color: white;">
                        Lantai 1
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row g-2 p-4">
                            <div class="col-md-4">
                                <svg id="svg" xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-file-medical" viewBox="0 0 16 16">
                                    <path d="M8.5 4.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L7 6l-.549.317a.5.5 0 1 0 .5.866l.549-.317V7.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L9 6l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V4.5zM5.5 9a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                                </svg>
                                <strong id="fnt-ttl">Unit Pelayanan Umum</strong> <br>
                                Unit ini melakukan pelayanan untuk pasien berusia 18 - 60 tahun.
                                Jadwal pelayanan :
                                Senin - Kamis : 07.30 - 15.00 WIB
                                Jumat : 07.30 - 15.30 WIB
                            </div>
                            <div class="col-md-4" style="height: 300px;">
                                <svg id="svg" xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                </svg>
                                <strong id="fnt-ttl">Unit Pelayanan 24 Jam</strong>
                                Melayani semua kategori pasien dan dilaksanakan setiap hari dengan jadwal pelayanan : 15.00 - 07.00 WIB. Sabtu, Minggu dan Hari Libur Nasional pelayanan dilakukan 24 Jam.
                            </div>
                            <div class="col-md-4" style="height: 300px;">
                                <svg id="svg" xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-heart-half" viewBox="0 0 16 16">
                                    <path d="M8 2.748v11.047c3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                                <strong id="fnt-ttl">Unit Pelayanan Lansia</strong>
                                Unit ini melakukan pelayanan untuk pasien diatas 60 tahun dan penderita disabilitas. Jadwal pelayanan unit ini sama dengan jadwal pelayanan unit pelayanan umum.
                            </div>
                            <div class="col-md-4" style="height: 300px;">
                                <svg id="svg" xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                    <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                    <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                </svg>
                                <strong id="fnt-ttl">Unit Pelayanan Loket</strong>
                                Pelayanan loket mengikuti jadwal pelayanan secara umum dan pelayan unit 24 jam.
                            </div>
                            <div class="col-md-4" style="height: 300px;">
                                <svg id="svg" xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                                <strong id="fnt-ttl">Unit Pelayanan KIA</strong>
                                Pelayanan bagi ibu hamil setiap hari Senin, Selasa, Kamis, & Jum'at pada jam kerja. Jadwal pelayanan mengikuti unit pelayanan umum.
                            </div>
                            <div class="col-md-4" style="height: 300px;">
                                <svg id="svg" xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-node-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM6.025 7.5a5 5 0 1 1 0 1H4A1.5 1.5 0 0 1 2.5 10h-1A1.5 1.5 0 0 1 0 8.5v-1A1.5 1.5 0 0 1 1.5 6h1A1.5 1.5 0 0 1 4 7.5h2.025zM11 5a.5.5 0 0 1 .5.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2A.5.5 0 0 1 11 5zM1.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                                </svg>
                                <strong id="fnt-ttl">Unit Pelayanan Farmasi</strong>
                                Pelayanan unit ini dilakukan setiap hari 24 Jam. Pelayanan ditujukan bagi pasien yang hendak mengambil obat atas resep dokter.
                            </div>
                            <div class="col-md-4" style="height: 300px;">
                                <svg id="svg" xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-thermometer-snow" viewBox="0 0 16 16">
                                    <path d="M5 12.5a1.5 1.5 0 1 1-2-1.415V9.5a.5.5 0 0 1 1 0v1.585A1.5 1.5 0 0 1 5 12.5z" />
                                    <path d="M1 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM3.5 1A1.5 1.5 0 0 0 2 2.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0L5 10.486V2.5A1.5 1.5 0 0 0 3.5 1zm5 1a.5.5 0 0 1 .5.5v1.293l.646-.647a.5.5 0 0 1 .708.708L9 5.207v1.927l1.669-.963.495-1.85a.5.5 0 1 1 .966.26l-.237.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.884.237a.5.5 0 1 1-.26.966l-1.848-.495L9.5 8l1.669.963 1.849-.495a.5.5 0 1 1 .258.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.237.883a.5.5 0 1 1-.966.258L10.67 9.83 9 8.866v1.927l1.354 1.353a.5.5 0 0 1-.708.708L9 12.207V13.5a.5.5 0 0 1-1 0v-11a.5.5 0 0 1 .5-.5z" />
                                </svg>
                                <strong id="fnt-ttl">Unit Pelayanan TB</strong>
                                Pelayanan unit ini dilakukan setiap hari kerja pada jam kerja. Unit ini melayani pasien dengan batuk kronis lebih dari 2 minggu dan terbatas untuk usia 5 tahun keatas.
                            </div>
                            <div class="col-md-4" style="height: 300px;">
                                <img src="../file/img/default_src/examinating-tooth.png" width="75" height="75">
                                <strong id="fnt-ttl">Unit Pelayanan Gigi</strong>
                            </div>
                            <div class="col-md-4" style="height: 300px;">
                                <svg id="svg" xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                                    <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                                </svg>
                                <strong id="fnt-ttl">Unit Pelayanan Gizi</strong>
                            </div>
                            <div class="col-md-4" style="height: 300px;">
                                <img src="../file/img/default_src/supplementary-food.png" width="75" height="75">
                                <strong id="fnt-ttl" style="font-size: 15px;">Unit Pelayanan Laboratorium</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item" style="border-color: #47c26c;">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color: #47c26c;color: white;">
                        Lantai 2
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body" style="background-color: whitesmoke; color: black;">
                        <div class="row g-2 p-4">
                            <div class="col-md-4" style="height: 300px;">
                                <img src="../file/img/default_src/wingback-chair.png" width="75" height="75">
                                <strong id="fnt-ttl">Ruang Pimpinan</strong>
                            </div>
                            <div class="col-md-4" style="height: 300px;">
                                <svg id="svg" xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                                    <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                                </svg>
                                <strong id="fnt-ttl">Aula Puskesmas Securai</strong>
                            </div>
                            <div class="col-md-4" style="height: 300px;">
                                <svg id="svg" xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                </svg>
                                <strong id="fnt-ttl">Unit Pelayanan Tata usaha</strong>
                            </div>
                            <div class="col-md-4" style="height: 300px;">
                                <svg id="svg" xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                                <strong id="fnt-ttl">Ruang UKM</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>