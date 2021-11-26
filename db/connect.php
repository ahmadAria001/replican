<?php

$servername = "localhost";
$username = "root";
$password = "Jancok-45";
$db = "first_puskesmas";

try {
    $connect = mysqli_connect($servername, $username, $password, $db);
    // phpinfo();
    // echo "Succes Connecting";
} catch (Exception) {
    echo "Database Connection Error" + $connect->error;
}
