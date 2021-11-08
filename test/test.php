<?php
include('../db/connect.php');
try {
    $qry = "SELECT `article`.`create_at`,`article`.`des`,`article`.`id`,`article`.`id_creator`,`article`.`id_destroyer`,
    `article`.`id_editor`,`article`.`is_deleted`,DATE_FORMAT(`article`.`time_start`,'%Y-%m-%dT%H:%i') AS tm_s,`article`.`title`,`article`.`tumbnail_pict`,
    `article`.`update_at`,DATE_FORMAT(`article`.`time_end`,'%Y-%m-%dT%H:%i') AS tm_e FROM `article`";
    $ftc = $connect->query($qry);
    $result = $ftc->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    echo "Error at: " . $e;
}

$fl = addslashes("https://www.youtube.com/embed/53JaOJhFsiI");
$u = "";
$y = addslashes("Vaksinasi tahap pertama");
$z = addslashes("Vaksinasi");
$x = "2021-08-10 08:00:00";
$e = "2021-08-10 17:00:00";
$b = "USR001";
$n = "ARTC003";

$qry = "UPDATE article SET title = '$z',des = '$y', time_start = '$x',time_end = '$e',
    id_editor = '$b',update_at = CURRENT_TIMESTAMP(),tumbnail_pict = '$fl' WHERE id = '$n'";

try {
    include('../db/connect.php');
    $connect->query($qry);
    $_SESSION['art_up'] = "Update Succes";
    header("Location: ../pages/article_input.php");
} catch (Exception $e) {
    echo "Error At: " . $e;
    $_SESSION['art_up'] = "Update Failed: " + $e;
    header("Location: ../pages/article_input.php");
}
