<?php
include "connection.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"), true);  
$user_id = $data['uid'];

$sql = "SELECT * FROM user WHERE id = {$user_id}";

$result = mysqli_query($conn, $sql) or ("SQL QUERY FAILED.");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result);
       echo json_encode($output);
}else{
   echo json_encode(array("message"=>"Data not found","status",false));
}


?>