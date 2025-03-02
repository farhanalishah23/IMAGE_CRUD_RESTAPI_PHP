<?php

include "connection.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers ,Content-Type , Access-Control-Allow-Methods, Authorization , X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$uid = $data["uid"];
$uname = $data["uname"];
$uemail = $data["uemail"];
$udescription = $data["udescription"];

$sql = "UPDATE user SET name = '{$uname}' , email = '{$uemail}' , description = '{$udescription}' WHERE id = '{$uid}'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array("message" => "User Data Updated Successfully!", "status" => true));
} else {
    echo json_encode(array("message" => "User Data not Updated Successfully!", "status" => false));
}
