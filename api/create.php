<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../students.php';
$database = new Database();
$db = $database->getConnection();
$item = new Student($db);


$item->name = $_GET['name'];
$item->branch = $_GET['branch'];
$item->mobile = $_GET['mobile'];
$item->gender = $_GET['gender'];
if($item->createStudent()){
    echo 'Student created successfully.';
} else{
    echo 'Student could not be created.';
}
?>