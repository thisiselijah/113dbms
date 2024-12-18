<?php

class ShopController extends Controller{

    private mixed $merchandiseModel;
    private mixed $merchandiseReviews;
    private mixed $cartsModel;
    private mixed $ordersModel;
    private mixed $orderItemsModel;

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
    

    public function searchItem(){
        $postData = $this->retrievePostData();
        if (!isset($postData['item']) || empty($postData['item'])) {
            $this->redirect('?url=show/merchandises');
        }
        $merchandises = $this->merchandiseModel->searchMerchandiseByName($postData['item']);
        if (empty($merchandises)) {
            $this->view('merchandises', [
                'categories' => $this->merchandiseModel->getAllMerchandiseCategoryCount(),
                'merchandises' => $merchandises,
                'merchandisesCount' => count($merchandises),
            ]);
        }
        $data = [
            'categories' => $this->merchandiseModel->getAllMerchandiseCategoryCount(),
            'merchandises' => $merchandises,
            'merchandisesCount' => count($merchandises),
        ];
        $this->view('merchandises', $data);
        
    }

    public function purchaseMerchandise(){
        $this->cartsModel = $this->model('CartsModel');
        $carts = $this->cartsModel->getUserCart();
        foreach($carts as $cart){
            $merchandise = $this->merchandiseModel->getMerchandiseNamePricePathById($cart['merchandise_id']);
            $merchandises[] = [
                'id' => $cart['id'],
                'name' => $merchandise['name'],
                'price' => $merchandise['price'],
                'image_path' => $merchandise['image_path'],
                'quantity' => $cart['quantity'],
                
            ];  
        }
        $data =[    
            'merchandises' => $merchandises
        ];
        $this->view('checkOut',$merchandises);
    }

    public function storeOrders(){
        $this->ordersModel = $this->model('Orders');
        $this->orderItemsModel = $this->model('Order_items');

        $postData = $this->retrievePostData();
        $status = 'confirmed'; 
        $items = $postData['items'];
        $this->ordersModel->insertOrder($postData['user_id'],$status,$postData['total_price'],$postData['address'],$postData['payment']);
        $order_id = $this->ordersModel->returnOrderId();
        foreach ($items as $item){
            $this->orderItemsModel->insertOrderItem($order_id['next_id'],$item['id'],$item['quantity']);
        }
        $this->redirect(".\?url=user/orders");
    }
    

}