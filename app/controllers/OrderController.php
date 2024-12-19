<?php

class OrderController extends Controller{
    private mixed $ordersModel;
    private mixed $orderItemsModel;
    private mixed $merchandiseModel;
    private mixed $merchandiseReviews;

    public function __construct() {
        $this->orderItemsModel = $this->model('Order_items');
        $this->ordersModel = $this->model('Orders'); 
        
    }

    public function  showOrders(){
        $this->merchandiseModel = $this->model('Merchandises');
        $getData = $this->retrieveGetData();
        $order_items = isset($getData['order_id']) 
            ? array_map(function($order_item) {
                $merchandise = $this->merchandiseModel->getMerchandiseNamePricePathById($order_item['merchandise_id']);
                if ($merchandise) {
                    $order_item['name'] = $merchandise['name'];
                    $order_item['price'] = $merchandise['price'];
                    $order_item['image_path'] = $merchandise['image_path'];
                }
                return $order_item;
            }, $this->orderItemsModel->orderItemsByUserIdOrderId($getData['order_id'], $_SESSION['id'])) 
            : [];

        $data = [
            'orders' => $this->ordersModel->retrieveOrdersByUserId($_SESSION['id']),
            'order_items' => $order_items,
        ];
        $this->view("orderList", $data);
    }

    public function storeReviews(){
        $this->merchandiseReviews = $this->model('MerchandiseReviews');
        $postData = $this->retrievePostData();
        $this->merchandiseReviews->insertReviews($postData['user_id'],$postData['merchandise_id'],$postData['comment'],$postData['rank']);
        $this->orderItemsModel->updateReviewStatus($postData['order_id'],$postData['merchandise_id'],$postData['review_status']);
        $this->redirect('./?url=user/orders');
    }
}