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
        $query = "SELECT * FROM Users WHERE account = :account";
        $this->db->query($query);
        $this->db->bind(':account', $account);
        $user = $this->db->getSingle();

        if ($user && password_verify($password, $user['password']) || $user['password'] == $password) {
            return $user;
        } else {
            return false;
        }
    }

    // 新增使用者至資料庫
    public function addUser($account, $password, $name, $email, $phone_number) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO Users (account, password, name, email, phone_number, identity)
                SELECT :account, :password, :name, :email, :phone_number, :identity
                WHERE NOT EXISTS (
                    SELECT 1 FROM Users WHERE account = :account
                )";
                
        $this->db->query($query);
        $this->db->bind(':account', $account);
        $this->db->bind(':password', $hashedPassword);
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone_number', $phone_number);
        $this->db->bind(':identity', 'user');   // 明確綁定 'user'
        
        $this->db->execute();
    }

    // 判斷帳號是否已存在
    public function isAccountExists($account) {
        $query = "SELECT * FROM Users WHERE account = :account";
        $this->db->query($query);
        $this->db->bind(':account', $account);
        $result = $this->db->getSingle();
        return $result > 0;
    }
}
?>