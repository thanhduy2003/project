<?php
class User extends Db
{

    public function checkLogin($username, $password)
    {
        $sql = self::$connection->prepare("SELECT * FROM users WHERE `username`= ? AND `password`=?");
        $password = md5($password);
        $sql->bind_param("ss", $username, $password);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->num_rows;

        if ($items == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserId($username)
    {
        $sql = self::$connection->prepare("SELECT `user_id` FROM users WHERE `username`= ?");
        $sql->bind_param("s", $username);
        $sql->execute();
        $item = $sql->get_result()->num_rows;
        return $item;
    }

    public function getIdProduct($user_id)
    {
        $sql = self::$connection->prepare("SELECT `id_product` FROM wishlist WHERE `id_user`= ?");
        $sql->bind_param("s", $user_id);
        $sql->execute();
        $item = $sql->get_result()->num_rows;
        return $item;
    }
}