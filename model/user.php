<?php
class User
{
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

    {
        $this->conn = $db;
    }

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
        //คำสั่ง SQL                                         :?????? เรียกว่า พารามิตเตอร์ที่จะต้องกำหนดข้อมูลให้มัน
        $strSQL = "INSERT INTO user_tb (userFullname,userName,userPassword,userStatus)";
        $strSQL .= "VALUES (:userFullname,:userName,:userPassword,1)";

        //กำหนด Statement ที่จะทำงานร่วมกับคำสั่ง SQL
        $stmt = $this->conn->prepare($strSQL);

        //ตรวจสอบข้อมูล
        $this->userFullname = htmlspecialchars(strip_tags($this->userFullname));
        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));
        $this->userStatus = 1;
       
        //กำหนดข้อมูลให้กับ พารามิเตอร์
        $stmt->bindParam(":userFullname", $this->userFullname);
        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":userPassword", $this->userPassword);
      
     

        //สั่งให้ SQL ทำงาน
        if ($stmt->execute()) { // ใช้วงเล็บ () ใน execute
            return true;
        } else {
            return false;
        }
        
    }
    //fuction updateUser ที่ทำงา่นกับ api_updateuser.php
    function updateUser()
    {
        //คำสั่ง SQL                                         :?????? เรียกว่า พารามิตเตอร์ที่จะต้องกำหนดข้อมูลให้มัน
        $strSQL = "UPDATE  user_tb SET userFullname = :userFullname,userName = :userName,userPassword=:userPassword WHERE userId = :userId";

        //กำหนด Statement ที่จะทำงานร่วมกับคำสั่ง SQL
        $stmt = $this->conn->prepare($strSQL);

        //ตรวจสอบข้อมูล
        $this->userId = intval(htmlspecialchars(strip_tags($this->userId))); //เอา intval มาครอบด้วยเพราะ Id เป็น int
        $this->userFullname = htmlspecialchars(strip_tags($this->userFullname));
        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));

        //กำหนดข้อมูลให้กับ พารามิเตอร์
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":userFullname", $this->userFullname);
        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":userPassword", $this->userPassword);

        //สั่งให้ SQL ทำงาน
        if ($stmt->execute()) {
            //สำเร็จ
            return true;
        } else {
            //ไม่สำเร็จ
            return false;
        }
    }
}
