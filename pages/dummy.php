<?php
session_start();
$usr_id = $_SESSION['id'];
$url = $_SESSION['url'];
// print_r($url);
include('../db/connect.php');
if ($url == "http://localhost:8000/pages/ask_pg.php") {
    $nama = addslashes($_POST['nama']);
    $nik = addslashes($_POST['nik']);
    $bpjs = addslashes($_POST['bpjs']);
    $hp = addslashes($_POST['hp']);
    $email = addslashes($_POST['email']);
    $question = addslashes($_POST['qst']);
    if (preg_match('/[^0-9.#\\-$]/@', $email)) {
        session_start();
        $_SESSION['ilchar'] = true;
        header("Location: ask_pg.php");
        return;
    }

    if ($nama != NULL && $nik != NULL && $bpjs != NULL && $hp != NULL && $email != NULL && $question != NULL || $nama != "" && $nik != "" && $bpjs != "" && $hp != "" && $email != "" && $question != "") {
        try {
            include('../php_func/insert_cht.php');
            ins($nama, $nik, $bpjs, $hp, $email, $question);
        } catch (Exception $e) {
            echo "Error At: " . $e;
            header("Location: ask_pg.php");
        }
    }
    header("Location: ask_pg.php");
}
if ($url == "http://localhost:8000/pages/answer.php") {
    $id =  $_POST['id'];
    $usr = $_SESSION['id'];
    $answ = addslashes($_POST['answ']);
    if ($answ != null || $answ != "") {
        try {
            include('../php_func/insert_cht.php');
            answ($usr, $answ, $id);
            echo "succes";
        } catch (Exception $e) {
            echo "Error at: " . $e;
        }
        header("Location: answer.php");
    }
}
if ($url == "http://localhost:8000/pages/article_input.php") {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $ttl = $_POST['judul'];
        $desck = $_POST['des'];
        $tm_s = $_POST['tm_s'];
        $tm_e = $_POST['tm_e'];
        $yt = $_POST['yt'];
        $radio = $_POST['tumb'];
        $tipe = $_POST['tipe'];
        print_r(var_dump($_FILES['pict']));

        //$_FILES["pict"]["name"] == null && $yt == null || $_FILES["pict"]["name"] == "" && $yt == "" || e
        if (
            $_FILES["pict"]["error"] == 4 && $radio == "pict" || $_FILES["pict"]["error"] == 4 && $radio == "yt"  ||
            $yt == "" && $radio == "pict" || $yt == null && $radio == "yt"
        ) {
            $tumb = "def_article_pict.jpg";
            echo $tumb;
            echo "empty <br>";
        }
        if ($radio == "yt" && $yt != "" || $radio == "yt" && $yt != null || $radio == "yt" && !empty($yt)) {
            $tmb = addslashes($yt);
            $tumb = $tmb;
        }
        if ($radio == "pict" && $_FILES["pict"]["error"] != 4) {
            $tmb = $_FILES["pict"]["name"];
            $tumb = $tmb;
        }

        if ($radio == "pict" && $_FILES["pict"]["error"] != 4) {
            $target_dir = "../file/img/img_artc/";
            $target_file = $target_dir . basename($_FILES["pict"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if (isset($_POST["id"])) {
                $check = getimagesize($_FILES["pict"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["pict"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["pict"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    // header("Location: article_input.php");
                }
            }
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
        }
        echo $tumb . $id . $ttl . $desck . $tm_s . $tm_e . $radio . $tipe . $usr_id;
        include('../php_func/insert_cht.php');
        art_up($ttl, $desck, $tumb, $tm_s, $tm_e, $usr_id, $id, $tipe);

        header("Location: article_input.php");
    }
}
