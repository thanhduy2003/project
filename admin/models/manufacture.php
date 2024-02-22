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
public function add($name)
    {
        $id = null;
        $sql = self::$connection->prepare("INSERT INTO manufactures (`manu_id`, `manu_name`) VALUES (?, ?)");
        $sql->bind_param("is",$id, $name);
        $sql->execute(); //return an object
    }
    public function update($id,$name)
    {
        $sql = self::$connection->prepare("UPDATE `manufactures` SET `manu_name`=? WHERE `manu_id`=?");
        $sql->bind_param("si", $name,$id);
        $sql->execute(); //return an object
    }
    public function DeleteManufacture($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE manu_id = ?");
        $sql->bind_param("i",$id);
        $sql->execute(); //return an object
    }
    public function checkExist($id)  {
        $sql = self::$connection->prepare("SELECT * FROM products, manufactures WHERE products.manu_id = manufactures.manu_id AND manufactures.manu_id = ? ");
        $sql->bind_param("s",$id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->num_rows;
        if ($items == 0 ) {
            return true;
        }else {
            return false;
        }
    }    
}

?>