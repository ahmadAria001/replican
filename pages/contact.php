<?php
// data container
require_once('../temp/source.php');

// data source
if (!isset($TPL)) {
  $TPL = new source();
  $TPL->title = "Kontak";
  $TPL->bodycontent = __FILE__;
  include "../layout/layout.php";
  exit;
}

?>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mb-3 mt-5 p-2" style="max-width: 450px;border-radius: 14px;border: 6.3px solid #019fb6; color: #019fb6; background-color: transparent;">
        <div class="row g-0">
          <div class="col-md-4" style="margin: auto;">
            <!-- <img src="../file/img/default_src/phonee.png" class="img-fluid rounded-start" alt="..."> -->
            <svg xmlns="http://www.w3.org/2000/svg" width="110" height="110" fill="currentColor" class="bi bi-telephone-forward" viewBox="0 0 16 16" style="margin: auto;">
              <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z" />
            </svg>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h3 class="card-title">Nomor Kontak</h3>
              <h5 class="card-text">Resepsionis</h5>
              <hr>
              <h4 style="text-align: center;">08XXXXXXX</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3 mt-5 p-2" style="max-width: 450px;border-radius: 14px;border: 6.3px solid #019fb6; color: #019fb6; background-color: transparent;">
        <div class="row g-0">
          <div class="col-md-4" style="margin: auto;">
            <!-- <img src="../file/img/default_src/phonee.png" class="img-fluid rounded-start" alt="..."> -->
            <svg xmlns="http://www.w3.org/2000/svg" width="110" height="110" fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
              <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
            </svg>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h3 class="card-title">Lokasi</h3>
              <h5 class="card-text">Jakarta Pusat</h5>
              <hr>
              <h6 style="text-align: center;">
                Jalan ##### XXX No.@@ Senen
              </h6>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3 mt-5 p-2" style="max-width: 450px;border-radius: 14px;border: 6.3px solid #019fb6; color: #019fb6; background-color: transparent;">
        <div class="row g-0">
          <div class="col-md-4" style="margin: auto;">
            <!-- <img src="../file/img/default_src/phonee.png" class="img-fluid rounded-start" alt="..."> -->
            <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
              <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
              <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
              <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
            </svg>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h3 class="card-title">Jam Operasional</h3>
              <h5 class="card-text">0X.XX - 00.00</h5>
              <hr>
              <h6 style="text-align: center;">
                Sabtu, Minggu & Hari Libur Nasional Layanan Tutup
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col mt-5">
      <div class="map-bd" style="max-width: 515px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2039137.0353436808!2d107.44436374999934!3d3.425578435509598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31e979f03ffac6dd%3A0x3039d80b220cee0!2sKabupaten%20Natuna%2C%20Kepulauan%20Riau!5e0!3m2!1sid!2sid!4v1634037712552!5m2!1sid!2sid" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>
</div>