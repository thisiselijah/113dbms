<?php
class CartsModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    
    public function addItem($merchandise_id, $quantity) {
        $user_id = $_SESSION['username'];
        $query = "INSERT INTO carts (user_id, merchandise_id, quantity) VALUES (:user_id, :merchandise_id, :quantity)";
        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':merchandise_id', $merchandise_id);
        $this->db->bind(':quantity', $quantity);
        $this->db->execute();

    }

    public function getUserCart() {
        $user_id = $_SESSION['username'];
        $query = "SELECT * FROM carts WHERE user_id = :user_id";
        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        $result =  $this->db->getAll();
        return $result;
    }
}    
?>