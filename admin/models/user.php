<?php 
class User extends Db{

    public function checkLogin($username,$password)  {
        $sql = self::$connection->prepare("SELECT * FROM users WHERE `username`= ? AND `password`=?");
        $password = md5($password);
        $sql->bind_param("ss",$username,$password);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->num_rows;
        if ($items ==1 ) {
            return true;
        }else {
            return false;
        }
    }    
    public function getAllUsers()
    {
        //Viet cau truy van 
        $sql = self::$connection->prepare("SELECT * FROM `users`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getUserId($username){
        $sql = self::$connection->prepare("SELECT `user_id` FROM users WHERE `username`= ?");       
        $sql->bind_param("s",$username);
        $sql->execute();
        $item = $sql->get_result()->num_rows;
        return $item;
    }
    
    public function getIdProduct($user_id){
        $sql = self::$connection->prepare("SELECT `id_product` FROM wishlist WHERE `id_user`= ?");       
        $sql->bind_param("s",$user_id);
        $sql->execute();
        $item = $sql->get_result()->num_rows;
        return $item;
    }
    public function add($username, $password , $role_id,$email,$phone,$address)
    {
        $id = null;
        $stmt1 = self::$connection->prepare("INSERT INTO `users` (`user_id`, `username`,`password`, `role_id`, `email`, `phone`, `address`) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
        $stmt1->bind_param("sssssss", $id, $username, $password , $role_id,$email,$phone,$address);
        $stmt1->execute();
    }
    public function update($username, $password , $role_id,$email,$phone,$address,$id)
    {
        $sql = self::$connection->prepare("UPDATE users SET `username`= ?,`password`= ?,`role_id`= ?, `email` = ?, `phone` = ?, `address` = ? WHERE `user_id` = ?");
        $sql->bind_param("sssssss", $username, $password , $role_id,$email,$phone,$address, $id);
        $sql->execute(); //return an object
    }   
    public function DeleteUser($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `users` WHERE `user_id` = ?");
        $sql->bind_param("i",$id);
        $sql->execute(); //return an object
    }
}
