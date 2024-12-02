<?php

class Merchandises
{
    private $db;
    public function __construct() {
        $this->db = new Database();
    } 

    public function getMerchandises() {
        $query = "SELECT * FROM `merchandises`";
        $this->db->query($query);
        return $this->db->getAll();
    }

    public function getMerchandiseById($id){
        $query = "SELECT * FROM `merchandises` WHERE `id` = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getSingle();
    }

    public function getMerchandisesByCategoryId($category_id) {
        $query = "SELECT * FROM `merchandises` WHERE `category_id` = :category_id";
        $this->db->query($query);
        $this->db->bind(':category_id', $category_id);
        return $this->db->getAll();
    }

    public function getAllMerchandisesCount() {
        $query = $query = "
        SELECT 
            c.id, 
            c.name, 
            COUNT(m.id) AS item_count
        FROM 
            `categories` c
        LEFT JOIN 
            `merchandises` m ON c.id = m.category_id
        GROUP BY 
            c.id
        ";
        $this->db->query($query);
        return $this->db->getAll();
    }
}
?>