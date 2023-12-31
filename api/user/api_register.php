<?php
header("Access-control-allow-origin: *"); //เผื่อมีการข้ามโดเมน เลยใส่ origin ไว้
header("content-type: application/json; charset=UTF-8"); //เกี่ยวกับ Character ของ json ที่่เราส่งเป็น UTF-8

//API ตัวนี้จะต้องติดต่อกับ DB และ ตารางUser เลยต้องinclude 2 ไฟล์นี้เข้ามา
include_once "./../../databaseconnect.php";
include_once "./../../model/user.php";

$databaseConnect = new DatabaseConnect();
$connDB = $databaseConnect->getConnection();

$user = new user($connDB);
//สร้างตัวแปรเก็บค่าของข้อมูลที่ส่งมาซึ่งเป็น JSON ที่ทำการ decodeคือแตกออกมาจากไฟล์ json แล้ว
$data = json_decode(file_get_contents("php://input"));

//เอาข้อมูลที่ถูก decode ไปเก็บไว้ในตัวแปร
$user->userFullname = $data->userFullname;
$user->userName = $data->userName;
$user->userPassword = $data->userPassword;

//เรียกใช้ฟังก์ชั่นตามวัตถุประสงค์ของ API นี้
if ($stmt = $user->registerUser()){
    //บันทึกสำเร็จ
    http_response_code(200);
    echo json_encode(array("message"=>"1"));
}else{
    //บันทึกไม่สำเร็จ
    http_response_code(200);
    echo json_encode(array("message"=>"0"));
}
