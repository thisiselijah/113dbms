<?php
class UsersModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    } 

    public function getUsers() {
        $query = "SELECT * FROM Users";
        $this->db->query($query);
        $result = $this->db->getAll();
        return $result;
    }

    public function getUsersByUsername($account, $password) {
        $query = "SELECT * FROM Users WHERE account = :account AND password = :password";
        $this->db->query($query);
        $this->db->bind(':account', $account);
        $this->db->bind(':password', $password);
        $result = $this->db->getSingle();
        return $result;
    }
}
?>