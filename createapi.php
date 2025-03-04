<?php
include "connection.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers ,Content-Type, Access-Control-Allow-Methods, Authorization , X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$user_name = $data["uname"] ? $data["uname"] :"no user name";
$user_email = $data["uemail"] ? $data["uemail"] : "no user email";
$user_description = $data["udescription"] ? $data["udescription"] : "no user description";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $fileName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExtention = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowedExtention = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExtention, $allowedExtention)) {

        $FileUniqueName = uniqid('', true) . '.' . $fileExtention;
        $fileDirectory = 'uploads/';

        if (!is_dir($fileDirectory)) {
            mkdir($fileDirectory, 0777, true);
        }

        if ($fileSize > 5 * 1024 * 1024) {
            echo json_encode(array("message" => "FileSize is not allowed more than 5MB.", "status" => true));
        }

        $targetFileUpload = $fileDirectory . $FileUniqueName;

        if (move_uploaded_file($tmpName, $targetFileUpload)) {
            $sql = "INSERT INTO user (name,email,description,image) VALUES ('{$user_name}','{$user_email}','{$user_description}','{$targetFileUpload}')";

            if (mysqli_query($conn, $sql)) {
                echo json_encode(array("message" => "User Data Inserted Successfully.", "status", true));
            } else {
                echo json_encode(array("message" => "You Are Failed To Insert User Data.", "status", false));
            }
        } else {
            echo json_encode(array("message" => "You Are Failed Upload User Image in directory.", "status", false));
        }
    } else {
        echo json_encode(array("message" => "Only jpg,jpeg,png and gif extentions are allowed to upload", "status" => false));
    }
} else {
    echo json_encode(array("message" => "You Are Failed To Upload User Image.", "status", false));
}
