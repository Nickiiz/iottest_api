<?php
class Room2{
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

        {$this ->conn = $db;}

    //ฟังก์ชันต่างๆ  ที่จะทำงานร่วมกับ Database ตาม API ที่เราจะทำการสร้างมันขึ้นมา ซึ่งมีมากน้อยแล้วแต่
}   