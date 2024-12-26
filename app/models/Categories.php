<?php
class Categories{
    private $db;
    public function __construct() {
        $this->db = new Database();
    } 

    public function getNameIdById($id) {
        $query = "SELECT `name` FROM `categories` WHERE `id` = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getSingle();
    }

    public function getCategory(){
        $query = "SELECT * FROM `categories`";
        $this->db->query($query);
        return $this->db->getAll();
    }
}