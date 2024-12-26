<?php

class Merchandises
{
    private $db;
    public function __construct() {
        $this->db = new Database();
    } 

    public function getLimitMerchandises($page) {
        $itemsPerPage = 9;
        $page = max(1, (int)$page); // 頁數至少為 1
        $offset = ($page - 1) * $itemsPerPage;
    
        // 查詢商品資料，並使用 LIMIT 和 OFFSET 參數
        $query = "SELECT * FROM `merchandises` LIMIT :limit OFFSET :offset";
        $this->db->query($query);
        $this->db->bind(':limit', $itemsPerPage);
        $this->db->bind(':offset', $offset);  
        return $this->db->getAll();
    }
    

    public function getMerchandiseById($id){
        $query = "SELECT * FROM `merchandises` WHERE `id` = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getSingle();
    }

    public function getMerchandiseNamePricePathById($id){
        $query = "SELECT `name`,`price`,`image_path` FROM `merchandises` WHERE `id` = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getSingle();
    }

    public function getMerchandisesByCategoryId($category_id, $page) {
        $itemsPerPage = 9; // 每頁顯示商品數量
    
        // 確保頁碼至少為 1
        $page = max(1, (int)$page); // 頁數至少為 1
        $offset = ($page - 1) * $itemsPerPage; // 計算偏移量
    
        // 查詢該類別商品並加上 LIMIT 和 OFFSET
        $query = "SELECT * FROM `merchandises` WHERE `category_id` = :category_id LIMIT :limit OFFSET :offset";
        $this->db->query($query);
        $this->db->bind(':category_id', $category_id);
        $this->db->bind(':limit', $itemsPerPage);  // 綁定數量
        $this->db->bind(':offset', $offset);  // 綁定偏移量
        return $this->db->getAll();
    }
    

    public function getAllMerchandiseCount() {
        $query = "SELECT COUNT(*) AS merchandise_count FROM `merchandises`";
        $this->db->query($query);
        $result = $this->db->getSingle(); // 獲取單行結果
        return $result['merchandise_count']; // 返回商品數量
    }

    public function getAllMerchandiseCategoryCount() {
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

    public function searchMerchandiseByName($keyword){
        $query = "SELECT * FROM `merchandises` WHERE `name` LIKE :keyword";
        $this->db->query($query);
        $this->db->bind(':keyword', "%$keyword%");
        return $this->db->getAll();
    }

    public function newMerchandise($category_id, $name, $description, $price, $stock_quantity, $image_path) {
        $query = "
            INSERT INTO `merchandises` 
            (`category_id`, `name`, `description`, `price`, `stock_quantity`, `image_path`, `created_at`, `updated_at`) 
            VALUES 
            (:category_id, :name, :description, :price, :stock_quantity, :image_path, NOW(), NOW())
        ";
        $this->db->query($query);
        $this->db->bind(':category_id', $category_id);
        $this->db->bind(':name', $name);
        $this->db->bind(':description', $description);
        $this->db->bind(':price', $price);
        $this->db->bind(':stock_quantity', $stock_quantity);
        $this->db->bind(':image_path', $image_path);
    
        return $this->db->execute();
    }

    public function updateMerchandise($data)
    {
        $query = "UPDATE `merchandises` 
                SET 
                    `name` = :name, 
                    `description` = :description, 
                    `price` = :price, 
                    `image_path` = :image_path,
                    `stock_quantity` = :stock, 
                    `category_id` = :category, 
                    `updated_at` = NOW() 
                WHERE `id` = :id";

        $this->db->query($query);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':image_path', $data['image_path']);
        $this->db->bind(':stock', $data['stock']);
        $this->db->bind(':category', $data['category']);
        return $this->db->execute();
    }


    // public function getPartialMerchandiseCategoryCount($merchandises) {
    //     $merchandiseIds = array_column($merchandises, 'id');
    //     if (empty($merchandiseIds)) {
    //         return [];
    //     }
    //     error_log(print_r($merchandiseIds, true));
        
    //     $query = "
    //     SELECT 
    //         c.id, 
    //         c.name, 
    //         COUNT(CASE WHEN m.id IS NOT NULL AND m.id IN (" . implode(',', $merchandiseIds) . ") THEN 1 ELSE NULL END) AS item_count
    //     FROM 
    //         `categories` c
    //     LEFT JOIN 
    //         `merchandises` m ON c.id = m.category_id
    //     GROUP BY 
    //         c.id
    //     ";
    //     $this->db->query($query);
    //     return $this->db->getAll();
        
    // }
}
?>