<?php
class User{
    //ตัวแปรที่ใช้ติดต่อกับ Database
    private $conn;
    //ตัวแปรที่ใช้ทำงานคู่กับแต่ละฟิวล์หรือคอลัมน์ในตาราง
    public $userId;
    public $userFullname;
    public $userName;
    public $userPassword;
    public $userStatus;

    //ตัวแปรที่จะเก็บข้อมุลใด เผิ้่อเอาไว้ใช้งานเฉยๆ
    public $message;

    //คอนสตรัคเตอร์์ที่จะมีคำสั่งที่ใช้ในการติดต่อกับ Database
    public function __construct($db)

        {$this ->conn = $db;}

    //ฟังก์ชันต่างๆ  ที่จะทำงานร่วมกับ Database ตาม API ที่เราจะทำการสร้างมันขึ้นมา ซึ่งมีมากน้อยแล้วแต่
    function loginUser()
    {
        //คำสั่ง SQL                                         :?????? เรียกว่า พารามิตเตอร์ที่จะต้องกำหนดข้อมูลให้มัน
        $strSQL = "SELECT * FROM user_tb WHERE userName = :userName and userPassword = :userPassword";

        //กำหนด Statement ที่จะทำงานร่วมกับคำสั่ง SQL
        $stmt = $this->conn->prepare($strSQL);

        //ตรวจสอบข้อมูล
        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));

        //กำหนดข้อมูลให้กับ พารามิเตอร์
        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":userPassword", $this->userPassword);

        //ส่งให้ SQL ทำงาน
        $stmt->execute();

        //ส่งค่าผลลัพธ์ที่ได้จากคำสั่ง SQL ไปใช้งาน
        return $stmt;
    }
    //fuction registerUser ที่ทำงา่นกับ api_registeruser.php
    function registerUser()
    {
    }
    //fuction updateUser ที่ทำงา่นกับ api_updateuser.php
    function updateUser()
    {
    }


}   