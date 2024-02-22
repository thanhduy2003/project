<?php
class ProductComment extends Db{
    public function addProductComment($product_id, $username,$review,$rating)
    {
        $sql = self::$connection->prepare("INSERT INTO `product_comment`(`product_id`, `user_id`,`review`,`rate`) 
        VALUES (?,?,?,?)");
        $sql->bind_param("issi",$product_id, $username,$review,$rating);
        return $sql->execute();
    }

    public function getReview($id, $page, $itemsPerPage)
    {
        //Viet cau truy van
        $first = (($page - 1) * $itemsPerPage);
        $sql = self::$connection->prepare("SELECT product_comment.*, users.username FROM `product_comment`,`users` WHERE product_comment.product_id = $id AND product_comment.user_id = users.user_id LIMIT $first,$itemsPerPage");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
