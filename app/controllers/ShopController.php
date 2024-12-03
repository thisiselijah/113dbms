<?php

class ShopController extends Controller{

    private mixed $merchandiseModel;
    public function __construct() {
        $this->merchandiseModel = $this->model('Merchandises'); 
        
    }

    public function showSingleProduct(){
        $this->merchandiseReviews = $this->model('MerchandiseReviews');
        $getData = $this->retrieveGetData();
        $data = [
            'merchandise' => $this->merchandiseModel->getMerchandiseById($getData['id']),
            'reviews' => $this->merchandiseReviews->getReviewsByMerchandiseId($getData['id']),
        ];
        $this->view('single-product',$data);
    }

    public function showMerchandises() {
        $getData = $this->retrieveGetData();
        $categories = $this->merchandiseModel->getAllMerchandisesCount();
        $merchandises = isset($getData['category_id']) && !empty($getData['category_id']) 
            ? $this->merchandiseModel->getMerchandisesByCategoryId($getData['category_id']) 
            : $this->merchandiseModel->getMerchandises();
        $data = [
            'categories' => $categories,
            'merchandises' => $merchandises,
        ];
        $this->view('merchandises', $data);
    }
    

    private function mergeMerchandises($merchandises, $categoriesCount) {
        $countMap = array_column($categoriesCount, null, 'id');
        foreach ($merchandises as &$merchandise) {
            $id = $merchandise['id'];
            $merchandise = array_merge($merchandise, $countMap[$id] ?? ['item_count' => 0]);
        }
        return $merchandises;
    }

    

}