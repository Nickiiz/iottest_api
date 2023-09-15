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
$user->userName = $data->userName;
$user->userPassword = $data->userPassword;

//เรียกใช้ฟังก์ชั่นตามวัตถุประสงค์ของ API นี้
$stmt = $user->loginUser();

//ต้องการนับแถวเพื่อดูข้อมูลมาไหม
$numrow = $stmt->rowCount();

//สร้างตัวแปรมาเก็บข้อมูลที่ได้จากการเรียนใช้ฟังกฺชัน เพื่อส่งกลับไปยังส่วนที่เรียกใช้ API
$user_arr = array();

//ตรวจสอบผลและส่งกลับไปยังส่งที่เรียกใช้ API
if ($numrow > 0) {
    //แปลว่ามีข้อมูล
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $user_item = array(
            "message" => "1",
            "userId" => $userId,
            "userFullname" => $userFullname
        );

        array_push($user_arr, $user_item);
    }
} else {
    //ไม่มีข้อมูล
    $user_item = array(
        "massage" => "0"
    );

    array_push($user_arr, $user_item);
}
//คำสั่งจัดการข้อมูลให้เป็น json เพื่อส่งกลับ
http_response_code(200);
echo json_encode($user_arr);
