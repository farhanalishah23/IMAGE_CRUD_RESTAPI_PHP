<?php
include "connection.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type , Access-Control-Allow-Methods, Authorization,X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$id = $data["uid"];

$sql = "DELETE FROM user WHERE id = '{$id}'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array("message" => "User Data Deleted Successfully.", "status" => true));
} else {
    echo json_encode(array("message" => "User Data not found.", "status" => false));
}

?>