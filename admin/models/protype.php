<?php
class Protype extends Db{
    public function getAllProtypes ()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM protypes");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function add($name)
    {
        $id = null;
        $sql = self::$connection->prepare("INSERT INTO protypes (`type_id`, `type_name`) VALUES ( ? , ? )");
        $sql->bind_param("is",$id, $name);
        $sql->execute(); //return an object
    }
    public function update($id,$name)
    {
        $sql = self::$connection->prepare("UPDATE `protypes` SET `type_name`=? WHERE `type_id`=?");
        $sql->bind_param("si", $name,$id);
        $sql->execute(); //return an object
    }
    public function DeleteProtype($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `protypes` WHERE `type_id` = ?");
        $sql->bind_param("i",$id);
        $sql->execute(); //return an object
    }
    public function checkExist($id)  {
        $sql = self::$connection->prepare("SELECT * FROM products, protypes WHERE products.type_id = protypes.type_id AND protypes.type_id = ? ");
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