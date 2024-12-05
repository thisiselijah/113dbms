<?php

class PageController extends Controller{
    private $CartsModel;
    private $Merchandises;

    public function showHome(){
        if (isset($_SESSION['id'])){
            $this->renderCart();
        }else{
            $this->view('homepage');
        }
        
    }

    public function showLoginPage(){
        $this->view('LogIn');
    }

    public function renderCart(){
        $this->CartsModel = $this->model('CartsModel');
        $this->Merchandises = $this->model('Merchandises');
        $usercart = $this->CartsModel->getUserCart();
        
        $data = [];
        foreach($usercart as $item){
            $quantity = $item['quantity'];
            $merchandise_id = $item['merchandise_id'];
            
            if (isset($data[$merchandise_id])) {
                $data[$merchandise_id]['quantity'] += $quantity;
            } else {
                $merchandisesData = $this->Merchandises->getMerchandiseById($merchandise_id);
                $image_path = $merchandisesData['image_path'];
                $price = $merchandisesData['price'];
                $merchandise_name = $merchandisesData['name'];

                $data[$merchandise_id] = [
                    'quantity' => $quantity,
                    'image_path' => $image_path,
                    'price' => $price,
                    'name' => $merchandise_name
                ];
            }
            
        }
        $this->view('homepage', $data);
    }

    public function getCart(){
        $this->CartsModel = $this->model('CartsModel');
        $this->Merchandises = $this->model('Merchandises');
        $usercart = $this->CartsModel->getUserCart();

        $data = [];
        foreach($usercart as $item){
            $quantity = $item['quantity'];
            $merchandise_id = $item['merchandise_id'];
            
            if (isset($data[$merchandise_id])) {
                $data[$merchandise_id]['quantity'] += $quantity;
            } else {
                $merchandisesData = $this->Merchandises->getMerchandiseById($merchandise_id);
                $image_path = $merchandisesData['image_path'];
                $price = $merchandisesData['price'];
                $merchandise_name = $merchandisesData['name'];

                $data[$merchandise_id] = [
                    'quantity' => $quantity,
                    'image_path' => $image_path,
                    'price' => $price,
                    'name' => $merchandise_name
                ];
            }
        }

        header('Content-Type: application/json');
        ob_clean();
        echo json_encode($data);
        // $this->redirect('home');
    }

    public function addItem(){
        $postData = $this->retrievePostData();
        $postData = json_decode(file_get_contents('php://input'), true);
        error_log(print_r($postData, true));
        $merchandise_id = $postData['merchandise_id'] ?? '';
        $quantity = $postData['quantity'] ?? '';
        $this->CartsModel = $this->model('CartsModel');
        $this->CartsModel->addItem($merchandise_id, $quantity);
        $response = [
            'status' => 'success',
            'message' => 'Item added to cart'
        ];  
        header('Content-Type: application/json');
        ob_clean();
        echo json_encode($response);

    }
}