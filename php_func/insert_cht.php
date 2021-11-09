<?php
session_start();
function ins($x, $y, $z, $c, $d, $e)
{
    try {
        include('../db/connect.php');
        $qry = "INSERT INTO
            cht(`cht`.`user`,`cht`.nik,`cht`.bpjs,`cht`.`telp`,`cht`.`email`,`cht`.`question`,`cht`.`create_at`)
            VALUES('$x','$y','$z','$c','$d','$e',CURRENT_TIMESTAMP())";
        $connect->real_query($qry);
        $_SESSION['qst_send'] = "Question Submitted";
    } catch (Exception $e) {
        echo "Error at: " . $e;
        $_SESSION['qst_send'] = "Fail Submitting Question with Error: " + $e;
    }
}

function answ($x, $y, $c)
{
    try {
        include('../db/connect.php');
        $qry = "UPDATE `cht` SET `cht`.id_user = '$x', `cht`.answer = '$y', `cht`.answer_at = CURRENT_TIMESTAMP() WHERE `cht`.id = '$c';";
        // $qry = "SELECT * FROM `cht` WHERE id = '$c'";
        $xy = $connect->query($qry);
        // print_r($xy);
    } catch (Exception $e) {
        echo "Error at: " . $e;
    }
}

function art_up($x, $y, $z, $b, $c, $v, $d, $n)
{
    $qryx = "UPDATE `article` SET `article`.`title` = '$x', `article`.`des` = '$y', `article`.`tumbnail_pict` = '$z', `article`.`time_start` = '$b',
    `article`.`time_end` = '$c', `article`.`id_editor` = '$v', `article`.`edite_at` = CURRENT_TIMESTAMP(),
    `article`.`article_type` = '$n'
    WHERE id = '$d'";
    try {
        include('../db/connect.php');
        $connect->query($qryx);
        $_SESSION['art_up'] = "Update Succes";
        echo "scs";
    } catch (Exception $e) {
        echo "Error At: " . $e;
        $_SESSION['art_up'] = "Update Failed: " + $e;
        echo "fail";
    }
}
