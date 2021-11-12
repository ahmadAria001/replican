<?php
require_once('../temp/source.php');


// data source
if (!isset($TPL)) {
    $TPL = new source();
    $TPL->title = "Jawab Pertanyaan";
    $TPL->bodycontent = __FILE__;
    include "../layout/layout.php";
    exit;
}

if (session_status() == 0) {
    session_start();
}
$_SESSION['url'] = "http://localhost:8000/pages/answer.php";

include('../db/connect.php');
try {
    $qry = "CALL call_chat()";
    $ftc = $connect->query($qry);
    // print_r($ftc);
    $result = $ftc->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    echo "Error at :" . $e;
}
if (empty($_SESSION['user'])) {
    $cont = "hidden";
} else {
    $cont = "";
}
?>

<div class="container-fluid" <?= $cont; ?>>
    <div class="row">
        <div class="col">
            <div class="cht-border p-3  mt-2 " style="overflow-y: scroll;">
                <center>
                    <p style="font-size: 25px;color: white;text-decoration: underline;">
                        Semua Pertanyaan
                    </p>
                </center>
                <?php
                foreach ($result as $res) :
                    if ($res['id_user'] == null) {
                        $answer_box = "hidden";
                    } else {
                        $answer_box = "";
                    }
                ?>
                    <div class="sender mt-2 d-block">
                        <div class="row">
                            <div class="col col-xl-3" style="width: 50%;text-align: center;">
                                <img src="../file/img/qustion/customer.png" alt="" style="justify-self: left;max-width: 70px;max-height: 70px;border-radius: 50%;">
                                <p style="font-size: 20px;color: white;">
                                    <?= $res['user']; ?>
                                </p>
                                <p style="font-size: 15px;color: grey;margin-top: 5px;">
                                    <?= $res['create_at']; ?>
                                </p>
                                <p style="color: white;font-size: 20px;">
                                    Pertanyaan: <br>
                                    <textarea cols="50" rows="10" class="p-2" readonly style="border-radius: 7px;background-color: transparent;border: 1px solid grey;height: fit-content;color: white;"><?= $res['question']; ?></textarea>
                                    <!-- <h5 style="color: azure;"><?= $res['question']; ?></h5> -->
                                </p>
                                <p style="font-size: 15px;color: white;">
                                    NIK: <?= $res['nik']; ?>
                                </p>
                                <p style="font-size: 15px;color: white;">
                                    BPJS: <?= $res['bpjs']; ?>
                                </p>
                                <p style="font-size: 15px;color: white;">
                                    No Telephone: <?= $res['telp']; ?>
                                </p>
                                <p style="font-size: 15px;color: white;">
                                    Email: <?= $res['email']; ?>
                                </p>
                            </div>
                            <div class="col col-xl-3" style="width: 50%;border-left: 2px solid white;justify-content: center;text-align: center;">
                                <div class="answer" <?= $answer_box; ?> style="text-align: center;">
                                    <img src="../file/img/qustion/cs.png" style="max-width: 70px;max-height: 70px;border-radius: 50%;" alt="">
                                    <p style="font-size: 20px;color: white;">
                                        <?= $res['username']; ?>
                                    </p>
                                    <p style="font-size: 15px;color: grey;margin-top: 5px;">
                                        <?= $res['answer_at']; ?>
                                    </p>
                                    <p style="color: white;font-size: 20px;">
                                        Balasan: <br>
                                        <textarea cols="30" readonly rows="10" class="p-2" style="border-radius: 7px;background-color: transparent;border: 1px solid grey;height: fit-content;color: white;"><?= $res['answer']; ?></textarea>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- <hr style="background-color: white;border: 1px solid white;"> -->
                        <form action="dummy.php" method="POST" style="color: white;">
                            <center>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jawaban:</label>
                                    <!-- <input type="text" class="form-control" name="answ" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                                    <textarea class="form-control" required id="answ" name="answ" cols="30" rows="10" style="width: 50%; height: 38px;" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                                    <input type="text" name="id" id="id" hidden value="<?= $res['id']; ?>">
                                </div>
                                <button type="submit" class="btn btn-outline mt-2 mb-1 sbm" style="max-width: 500px;">Submit</button>
                            </center>
                        </form>
                    </div>
                    <hr style="background-color: white;border: 1px solid white;">
                <?php endforeach; ?>
            </div>
        </div>
    </div>