<?php
class Orders {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    
    public function insertOrder($user_id,$status,$total_price,$address,$payment){
        $query = "INSERT INTO `orders` (`user_id`, `status`, `total_price`, `address`,`payment`) VALUES (:user_id, :status, :total_price, :address,:payment)";
        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':status', $status);
        $this->db->bind(':total_price', $total_price);
        $this->db->bind(':address', $address);
        $this->db->bind(':payment',$payment);
        $this->db->execute();
    }

    public function retrieveOrdersByUserId($user_id){
        $query = "SELECT * FROM `orders` WHERE `user_id` = :user_id";
        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        return $this->db->getAll();
    } 

    public function returnOrderId(){
        $query = "SELECT COALESCE(MAX(id), 0) AS next_id FROM `orders`";
        $this->db->query($query);
        return $this->db->getSingle();
    }
}    
?>