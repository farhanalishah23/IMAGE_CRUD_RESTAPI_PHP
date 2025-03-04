<?php 
include "connection.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$sql = 'SELECT * FROM user';
$result =mysqli_query($conn,$sql) or die("SQL QUERY FAILED.");

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array("message"=>"User Data not found","status"=>false));
}

?>