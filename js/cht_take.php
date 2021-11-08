<?php
include('../database/connection.php');
$sql = mysqli_query($connect, "CALL selector_user('" . $user_id . "')");
$result = array();

while ($row = mysqli_fetch_assoc($sql)) {
    $data[] = $row;
}
//print_r($data);

echo json_encode(array("result" => $data));
