<?php
class Database
{
    public static $connection = NULL;
    //Tao ket noi connection
    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            //khai bao bang ma unicode
            self::$connection->set_charset('utf8mb4');
        }
    }

    //lay du lieu (select * )
    public function select($sql) {
        $items = [];
        $sql->execute(); // thuc hien cau truy van sql

        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC); //Lay ket qua tu cau SQL tra lai duoi dang associative array

        return $items;
    }

    
}
