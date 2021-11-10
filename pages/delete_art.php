<?php
session_start();
$usr_id = $_SESSION['id'];
include('../db/connect.php');

$id = $_GET['id'];
print_r($id . $usr_id);

$qry = "UPDATE article SET id_destroyer = '$usr_id', is_deleted = 1, deleted_at = CURRENT_TIMESTAMP() WHERE id = '$id'";

$connect->query($qry);

$_SESSION['art_up'] = "Delete Succes";

header("Location: article_input.php");
