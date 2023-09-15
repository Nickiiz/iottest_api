<?php
class Room1
{
    //ตัวแปรที่ใช้ติดต่อกับ Database
    private $conn;
    //ตัวแปรที่ใช้ทำงานคู่กับแต่ละฟิวล์หรือคอลัมน์ในตาราง
    public $id;
    public $airValue1;
    public $airValue2;
    public $airValue3;
    public $roomDate;
    public $roomTime;

    //ตัวแปรที่จะเก็บข้อมุลใด เผิ้่อเอาไว้ใช้งานเฉยๆ
    public $message;

    //คอนสตรัคเตอร์์ที่จะมีคำสั่งที่ใช้ในการติดต่อกับ Database
    public function __construct($db)

    {
        $this->conn = $db;
    }

    //ฟังก์ชันต่างๆ  ที่จะทำงานร่วมกับ Database ตาม API ที่เราจะทำการสร้างมันขึ้นมา ซึ่งมีมากน้อยแล้วแต่
    //fuction getAllTempRoom1 ที่ทำงา่นกับ api_getAllTempRoom1.php
    //วัตถุประสงค์ของฟังก์ชันนี้คือ ไปเอาอุณหภูมิทั้งหมดที่มีในตาราง room1 มา
    function getAllTempRoom1()
    {
        $strSQL = "SELECT * FROM room1_tb";

        //กำหนด Statement ที่จะทำงานร่วมกับคำสั่ง SQL
        $stmt = $this->conn->prepare($strSQL);



        //ส่งให้ SQL ทำงาน
        $stmt->execute();

        //ส่งค่าผลลัพธ์ที่ได้จากคำสั่ง SQL ไปใช้งาน
        return $stmt;
    }

    //fuction getAirValue2 อยากได้เฉพาะ แอร์ตัวที่ 2 ของ room 1 ที่ทำงา่นกับ api_getAirValue2Room1.php
    //วัตถุประสงค์ของฟังก์ชันนี้คือ ต้องการเฉพาะ แอร์ตัวที่ 2 ของ room 1 ทั้งหมด
    function getAirValue2Room1()
    {
        $strSQL = "SELECT airValue2,roomDate,roomTime FROM room1_tb";

        //กำหนด Statement ที่จะทำงานร่วมกับคำสั่ง SQL
        $stmt = $this->conn->prepare($strSQL);



        //ส่งให้ SQL ทำงาน
        $stmt->execute();

        //ส่งค่าผลลัพธ์ที่ได้จากคำสั่ง SQL ไปใช้งาน
        return $stmt;
    }
    //fuction getAllTempLess20Room1 อยากได้อุณหภูมิที่น้อยกว่า 20 องศา ของ room 1 ที่ทำงา่นกับ api_getAllTempLess20Room1.php
    //วัตถุประสงค์ของฟังก์ชันนี้คือ ต้องการเฉพาะ แอร์ตัวที่ 2 ของ room 1 ทั้งหมด
    function getAllTempLess20Room1()
    {
        $strSQL = "SELECT * FROM room1_tb WHERE airValue1 < 23 and airValue2 < 23 and airValue3 < 23";

        //กำหนด Statement ที่จะทำงานร่วมกับคำสั่ง SQL
        $stmt = $this->conn->prepare($strSQL);



        //ส่งให้ SQL ทำงาน
        $stmt->execute();

        //ส่งค่าผลลัพธ์ที่ได้จากคำสั่ง SQL ไปใช้งาน
        return $stmt;
    

    }
}