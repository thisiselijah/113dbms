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
                $data[$merchandise_id] += $quantity;
            } else {
                $data[$merchandise_id]['quantity'] = $quantity;
                $merchandisesData = $this->Merchandises->getMerchandiseById($merchandise_id);
                $image_path = $merchandisesData['image_path'];
                $price = $merchandisesData['price'];
                $merchandise_name = $merchandisesData['name'];
                $data[$merchandise_id]['image_path']= $image_path;
                $data[$merchandise_id]['price'] = $price;
                $data[$merchandise_id]['name'] = $merchandise_name;

                
            }
            
        }
        
        $this->view('homepage', $data);
    }
}