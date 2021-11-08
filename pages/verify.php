<?php
session_start();

$user = addslashes($_POST['user']);
$pass = addslashes($_POST['pass']);

try {
    include('../db/connect.php');
    $qry = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $ftc = $connect->query($qry);
    // $count = $ftc->num_rows;
    $result = $ftc->fetch_assoc();
} catch (Exception $e) {
    echo "Error at: " . $e;
}

// print_r($result);
if (!empty($result)) {
    lg($result);
    header("Location: index.php");
}
if (empty($result) || $result == "" || $result == null) {
    session_start();
    $_SESSION['inc'] = "Username atau Sandi Salah";
    header("Location: login.php");
}

function lg($result)
{
    session_start();
    // print_r($result);
    $id = $result["id"];
    $nam = $result["username"];
    $jb = $result["user_type"];
    $_SESSION['user'] = $nam;
    $_SESSION['job'] = $jb;
    $_SESSION['id'] = $id;
    // print_r($_SESSION['user']);
}
