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
}
?>