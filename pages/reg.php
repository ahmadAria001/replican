<?php
session_start(); //session starting
$usr_id = $_SESSION['id']; //User get

//get variable
$usr = addslashes($_POST['user']);
$pw = addslashes($_POST['pass']);
$tipe = $_POST['tipe'];

//qury execute
include('../db/connect.php');

$qry = "SELECT * FROM users WHERE username = '$usr'"; //qury
$ftc = $connect->query($qry);
$res = $ftc->num_rows;
if ($res == 1) {
    $_SESSION['reg'] = "Username Already Exist";
    header("Location: register.php");
} else {
    try {
        $qry2 = "INSERT INTO users (username,password,user_type,register_id)
            VALUES ('$usr', '$pw', '$tipe','$usr_id')";
        $connect->query($qry2);
        $_SESSION['reg'] = "Succes Register";
    } catch (\Throwable $th) {
        //throw $th;
        $_SESSION['reg'] = "Failed Register";
    }
    header("Location: register.php");
}
