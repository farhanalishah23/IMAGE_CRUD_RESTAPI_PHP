<?php
include "connection.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers ,Content-Type, Access-Control-Allow-Methods, Authorization , X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);
$user_name = $data["uname"];
$user_email = $data["uemail"];
$user_description = $data["udescription"];

$sql = "INSERT INTO user (name,email,description) VALUES ('{$user_name}','{$user_email}','{$user_description}')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array("message" => "User Data Inserted Successfully.", "status", true));
} else {
    echo json_encode(array("message" => "You Are Failed To Insert User Data.", "status", true));
}
