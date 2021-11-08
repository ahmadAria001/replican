<?php

function ins($x, $y, $z, $c, $d, $e)
{
    try {
        include('../db/connect.php');
        $qry = "INSERT INTO
            cht(`cht`.`user`,`cht`.nik,`cht`.bpjs,`cht`.`telp`,`cht`.`email`,`cht`.`question`,`cht`.`create_at`)
            VALUES('$x','$y','$z','$c','$d','$e',CURRENT_TIMESTAMP())";
        $connect->real_query($qry);
    } catch (Exception $e) {
        echo "Error at: " . $e;
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

function art_up($x, $y, $z, $b, $c, $v, $d)
{
}
