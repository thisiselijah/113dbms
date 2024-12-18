<?php
class Order_items {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    
    public function insertOrderItem($order_id,$merchandise_id,$quantity){
        $query = "INSERT INTO `order_items` (`order_id`, `merchandise_id`, `quantity`) VALUES (:order_id, :merchandise_id, :quantity)";
        $this->db->query($query);
        $this->db->bind(':order_id', $order_id);
        $this->db->bind(':merchandise_id', $merchandise_id);
        $this->db->bind(':quantity', $quantity);
        $this->db->execute();
    }
    
    public function orderItemsByUserIdOrderId($order_id, $user_id) {
        $query = "
            SELECT oi.merchandise_id, oi.quantity
            FROM `order_items` AS oi
            JOIN `orders` AS o ON oi.order_id = o.id
            WHERE oi.order_id = :order_id AND o.user_id = :user_id
        ";
        $this->db->query($query);
        $this->db->bind(':order_id', $order_id);
        $this->db->bind(':user_id', $user_id);
        return $this->db->getAll();
    }
    
    
}    
?>