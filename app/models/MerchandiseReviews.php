<?php
class MerchandiseReviews{
    private $db;
    public function __construct() {
        $this->db = new Database();
    } 

    public function getReviewsByMerchandiseId($merchandise_id) {
        $query = "SELECT 
                merchandise_reviews.id AS review_id,
                merchandise_reviews.merchandise_id AS merchandise_id,
                Users.name AS user_name,
                merchandises.name AS merchandise_name,
                merchandise_reviews.rank AS review_rank,
                merchandise_reviews.commit AS review_comment,
                merchandise_reviews.created_at AS review_date
            FROM 
                merchandise_reviews
            JOIN 
                Users ON merchandise_reviews.user_id = Users.id
            JOIN 
                merchandises ON merchandise_reviews.merchandise_id = merchandises.id
            WHERE 
                merchandise_reviews.merchandise_id = :merchandise_id
        ";
        $this->db->query($query);
        $this->db->bind(':merchandise_id', $merchandise_id);
        return $this->db->getAll();
    }
    
    public function insertReviews($user_id,$merchandise_id,$comment,$rank){
        $query = "INSERT INTO `merchandise_reviews` (`user_id`, `merchandise_id`, `commit`, `rank`) 
        VALUES (:user_id, :merchandise_id, :commit, :rank)";
        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':merchandise_id', $merchandise_id);
        $this->db->bind(':commit', $comment);
        $this->db->bind(':rank', $rank);
        return $this->db->execute();
    }
}