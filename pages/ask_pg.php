<?php
// data container
require_once('../temp/source.php');


// data source
if (!isset($TPL)) {
    $TPL = new source();
    $TPL->title = "Tanya Dokter";
    $TPL->bodycontent = __FILE__;
    include "../layout/layout.php";
    exit;
}

if (session_status() == 0) {
    session_start();
}
$_SESSION['url'] = "http://localhost:8000/pages/ask_pg.php";

include('../db/connect.php');
try {
    $qry = "CALL chat_call()";
    $ftc = $connect->query($qry);
    $result = $ftc->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    echo "Error at :" . $e;
}
?>

<script src="../js/keypress.js"></script>

<div class="container-fluid">
    <div class="row mt-3">
        <?php
        if (isset($_SESSION['ilchar']) == true) {
            echo
            '<center>
                <div class="alert alert-danger d-flex justify-content-center align-items-center" role="alert" style="max-width: 90%;">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                  Karakter Illegal Terdeteksi Saat Menginput Email | 
                  Karakter Illegal: /[^A-Za-z0-9.#\\-$]/
                </div>
                  <button class="btn-close" data-bs-dismiss="alert" style="float: right;" aria-label="Close"></button>
              </div>
              </center>';
        }
        ?>
        <div class="col mt-3" style="max-width: 60%; height: 500px;">
            <div class="cht-border p-3" style="overflow-y: scroll;">
                <p style="font-size: 25px;color: white;text-decoration: underline;">
                    Semua Pertanyaan
                </p>
                <?php
                foreach ($result as $res) :
                    if ($res['id_user'] == null) {
                        $answer_box = "hidden";
                    } else {
                        $answer_box = "";
                    }
                ?>
                    <div class="col">
                        <div class="sender">
                            <img src="../file/img/qustion/customer.png" alt="" align="left" style="justify-self: left;max-width: 70px;max-height: 70px;border-radius: 50%;">
                            <p style="font-size: 20px;color: white;">
                                <?= $res['user']; ?>
                            </p>
                            <p style="font-size: 15px;color: grey;margin-top: 5px;">
                                <?= $res['create_at']; ?>
                            </p>
                            <p style="color: white;font-size: 16px;">
                                <?= $res['question']; ?>
                            </p>
                        </div>
                        <!-- <hr style="background-color: white;border: 1px solid white;"> -->
                        <div class="answer" <?= $answer_box; ?> align="right">
                            <img src="../file/img/qustion/cs.png" align="right" style="justify-self: right;max-width: 70px;max-height: 70px;border-radius: 50%;" alt="">
                            <p style="font-size: 20px;color: white;">
                                <?= $res['nama']; ?>
                            </p>
                            <p style="font-size: 15px;color: grey;margin-top: 5px;">
                                <?= $res['answer_at']; ?>
                            </p>
                            <p style="color: white;font-size: 16px;">
                                <?= $res['answer']; ?>
                            </p>
                        </div>
                    </div>
                    <hr style="background-color: white;border: 1px solid white;">
                <?php endforeach;
                ?>
            </div>
        </div>
        <div class="col" style="max-width: 40%;">
            <div class="ipt p-2" style="border: 1px solid white;border-radius: 10px;">
                <h5>Data Diri</h5>
                <form action="dummy.php" method="post">
                    <input class="form-control mt-2" required name="nama" placeholder="Nama Lengkap" type="text" name="">
                    <input class="form-control mt-2" required name="nik" placeholder="NIK" type="number" name="">
                    <input class="form-control mt-2" required name="bpjs" placeholder="No.BPJS" type="number" name="">
                    <input class="form-control mt-2" required name="hp" placeholder="No Telpon" type="number" name="">
                    <input class="form-control mt-2" required id="eml" name="email" placeholder="Email" onkeypress="" type="email" name="">
                    <textarea id="my-textarea" required class="form-control mt-2" id="qst" name="qst" style="min-height: 143px;" placeholder="Pertanyaan" name="" rows="3"></textarea>
                    <button type="submit" name="submit" id="submit" class="btn btn-outline mt-2 mb-1 sbm">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$_SESSION['ilchar'] = null;
$_SESSION['ilchar'] = "";
unset($_SESSION['ilchar']);
?>