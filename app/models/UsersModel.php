<?php
class UsersModel {
    private $db;
    public function __construct() {
        $this->db = new Database();
    } 

    public function getUsers() {
        $query = "SELECT * FROM Users";
        $retult = $this->db->query($query);
        $retult = $this->db->getAll();
        return $retult;
    }

    public function getUsersByUsername($username, $password) {
        $query = "SELECT * FROM Users WHERE username = :username AND password = :password";
        $retult = $this->db->query($query);
        $retult = $this->db->bind(':username', $username);
        $retult = $this->db->getSingle();
        return $retult;
    }
}

?>