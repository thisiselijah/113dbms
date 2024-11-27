<?php

class MerchandiseModel
{
    private $db;
    public function __construct() {
        $this->db = new Database();
    } 

    public function getMerchandise() {
        $query = "SELECT * FROM merchandise";
        $retult = $this->db->query($query);
        $retult = $this->db->getAll();
        return $retult;
    }
}
?>