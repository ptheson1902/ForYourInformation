<?php

class DB {
    private static $db = NULL;
    public static function connection() {
        if(!isset(self::$db)){
            try{
                self::$db = new PDO("mysql:host=localhost;dbname=ptheson","ptheson","eccMyAdmin");
                self::$db -> exec("SET NAMES 'utf8'");
            }catch(PDOException $ex){
                echo 'Error inconnection database: '. $ex -> getMessage();
            }
        }
        return self::$db;
    }

    public static function getBrand(){
        $db = self::connection();
        $sql = "SELECT DISTINCT(product_brand) FROM product WHERE product_status=1 ORDER BY product_id DESC";
        $stmt = $db -> prepare($sql);
        $stmt -> execute();
        $record = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $record[] = $row;
        }
        return $record;
    }
    public static function getRam(){
        $db = self::connection();
        $sql = "SELECT DISTINCT(product_ram) FROM product WHERE product_status=1 ORDER BY product_ram DESC";
        $stmt = $db -> prepare($sql);
        $stmt -> execute();
        $record = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $record[] = $row;
        }
        return $record;
    }
    public static function getStorage(){
        $db = self::connection();
        $sql = "SELECT DISTINCT(product_storage) FROM product WHERE product_status=1 ORDER BY product_storage DESC";
        $stmt = $db -> prepare($sql);
        $stmt -> execute();
        $record = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $record[] = $row;
        }
        return $record;
    }
}

?>