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
$user_image = $data["image"];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $fileName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExtention = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowedExtention = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExtention, $allowedExtention)) {

        $FileUniqueName = uniqid('',true) . '.'. $fileExtention;
        $fileDirectory = 'uploads/';
        
        $targetFileUpload = $fileDirectory . $FileUniqueName;

        if(move_uploaded_file($tmpName,$targetFileUpload)){
            $sql = "INSERT INTO user (name,email,description,image) VALUES ('{$user_name}','{$user_email}','{$user_description}','{$targetFileUpload}')";

            if (mysqli_query($conn, $sql)) {
                echo json_encode(array("message" => "User Data Inserted Successfully.", "status", true));
            } else {
                echo json_encode(array("message" => "You Are Failed To Insert User Data.", "status", false));
            }
        }else{
            echo json_encode(array("message" => "You Are Failed Upload User Image in directory.", "status", false));
        }
     
    }
} else {
    echo json_encode(array("message" => "You Are Failed To Upload User Image.", "status", false));
}
