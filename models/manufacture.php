<?php 
class Manufacture extends Db
{
public function getAllManufacture()
{
    //Viet cau truy van 
$sql = self::$connection->prepare("SELECT * FROM manufactures");
$sql->execute();
$items = array();
$items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
return $items;
}
}

?>