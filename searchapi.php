<?php 

include "connection.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');

$search = isset($_GET["search"]);

$sql = "SELECT * FROM user WHERE name LIKE '%{$search}%'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}else{
   echo json_encode(array("message"=>"No Search Found.","status"=>false));
}

?>