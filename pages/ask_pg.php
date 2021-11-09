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
    $qry = "CALL call_chat()";
    $ftc = $connect->query($qry);
    $result = $ftc->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    echo "Error at :" . $e;
}
?>

<script src="../js/keypress.js"></script>

<div class="container-fluid">
    <?php
    if (strpos(isset($_SESSION['qst_send']), "Question Submitted")) {
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

        <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            ' . $_SESSION['qst_send'] . '
        </div>
        </div>
    ';
        unset($_SESSION['qst_send']);
    }
    if (strpos(isset($_SESSION['qst_send']), "Fail Submitting Question with Error: ")) {
        echo '
        <center>
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <div>
                ' . $_SESSION['qst_send'] . '
            </div>
        </div>
    </center>
        ';
        unset($_SESSION['qst_send']);
    }
    ?>
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