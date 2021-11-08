<?php

$servername = "localhost";
$username = "usr";
$password = "Secureddatabase";
$db = "first_puskesmas";

try {
    $connect = mysqli_connect($servername, $username, $password, $db);
    // phpinfo();
    // echo "Succes Connecting";
} catch (Exception) {
    echo "Database Connection Error" + $connect->error;
}
