<?php
session_start();
$usr_id = $_SESSION['id'];
$url = $_SESSION['url'];
// print_r($url);
include('../db/connect.php');

$ttlin = addslashes($_POST['ttl_input']);
$des = addslashes($_POST['des_in']);
$time_s = $_POST['time_start'];
$time_e = $_POST['time_end'];
$rad = $_POST['rad'];
$ytin = addslashes($_POST['yt_in']);
$tipe = $_POST['tipe'];
$tp = $tipe;

print_r($_FILES);
echo '<br>' . $tipe . '<br>';
if (
    $_FILES["pictin"]["error"] == 4 && $rad == "pict" || $_FILES["pictin"]["error"] == 4 && $rad == "yt"  ||
    $ytin == "" && $rad == "pict" || $ytin == null && $rad == "yt"
) {
    $tmb_in = "def_article_pict.jpg";
}
if ($rad == "yt" && $ytin != "" || $rad == "yt" && $ytin != null || $rad == "yt" && !empty($ytin)) {
    $tmb_in = addslashes($ytin);
}
if ($rad == "pict" && $_FILES["pictin"]["error"] != 4) {
    $tmb_in = $_FILES["pictin"]["name"];
}
echo $ttlin . $des . $time_s . $time_e . $rad;

if ($rad == "pict" && $_FILES["pictin"]["error"] != 4) {
    $target_dir = "../file/img/img_artc/";
    $target_file = $target_dir . basename($_FILES["pictin"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["pictin"]["tmp_name"]);
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
        if (move_uploaded_file($_FILES["pictin"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["pictin"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
}
print_r($tp . $ttlin . $des . $time_s . $time_e . $rad . $tmb_in);

$qry = "INSERT INTO `article` (title,des,tumbnail_pict,time_start,time_end,id_creator,article_type)
                VALUES ('$ttlin','$des','$tmb_in','$time_s','$time_e','$usr_id','$tp')";
try {
    $connect->query($qry);
    $_SESSION['nw_artc'] = "Input Article Succes";
    header("Location: article_input.php");
} catch (Exception $e) {
    $_SESSION['nw_artc'] = "Input Article Failed";
    header("Location: article_input.php");
}
