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
        $categories = $this->merchandiseModel->getAllMerchandiseCategoryCount();
        $merchandises = isset($getData['category_id']) && !empty($getData['category_id']) 
            ? $this->merchandiseModel->getMerchandisesByCategoryId($getData['category_id'],isset($getData['page']) ? (int)$getData['page'] : 1) 
            : $this->merchandiseModel->getLimitMerchandises(isset($getData['page']) ? (int)$getData['page'] : 1);
        $data = [
            'categories' => $categories,
            'merchandises' => $merchandises,
            'merchandisesCount' => $this->merchandiseModel->getAllMerchandiseCount(),
        ];
        $this->view('merchandises', $data);
    }

    

}