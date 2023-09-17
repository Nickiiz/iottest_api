<?php
//databaseconnect เป็นไฟล์กลางที่จะใช้ร่วมกับ API ต่างๆๆ เพื่อที่จะใช้ติดต่อและทำงานกับ Database
class Databaseconnect
{
    //ประกาศตัวแปรเก็บค่าต่างๆ ที่จะต้องใช้ในกาติดต่อกับฐานข้อมูล
    private $host = "localhost"; //ชื่อ Server ของ DB Server ถ้า API อยู่เครื่องเดียวกับ DB ใช้ชื่อ localhost ถ้าอยู่คนละเครื่อง ต้องใช้เป็นหมายเลข IP,Url ของเครื่องที่เก็บ DB
    private $uname = "root"; //username ที่เข้าใช้งานฐานข้อมูล
    private $pword = ""; //password ที่เข้าใช้งานฐานข้อมูล
    private $dbname = "iottest_db"; //ชื่อฐานข้อมูลที่จะทำงานด้วย

    //ประกาศตัวแปรเพื่อใช้สำหรับการติดต่อกับฐานข้อมูล
    public $conn;

    //ฟังก์ชันสำหรับการติดต่อไปยังฐานข้อมูล
    public function getConnection()
    {
        $this->conn = null;

        try {
            //ติดต่อฐานข้อมูล
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->uname, $this->pword);
            //log ดูผลว่าติดต่อฐานข้อมูลได้หรือไม่ได้ แล้วอย่าลืม comment
            //echo "Connect OK";
        } catch (PDOException $ex) {
            //log ดูผลว่าติดต่อฐานข้อมูลได้หรือไม่ได้ แล้วอย่าลืม comment
            //echo "Connect NOT OK";
        }

        return $this->conn;
    }
}
//INSERT INTO ****_tb
//(userFullname,userName,userPassword,userStatus)
//VALUES (ต้องลงให้ครบเท่าตัวแปร อย่างอันนี้ใช้ 4 ตัว)
//('Fullname','Name','Password','Status'),
//('Fullname','Name','Password','Status'),
//('Fullname','Name','Password','Status'),
//('Fullname','Name','Password','Status')
