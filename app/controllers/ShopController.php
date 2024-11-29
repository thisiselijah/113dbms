<?php

class ShopController extends Controller{

    private mixed $merchandiseModel;
    public function __construct() {
        $this->merchandiseModel = $this->model('Merchandises'); 
    }

    public function showMerchandises(){
        $merchandises = $this->merchandiseModel->getMerchandises();
        $this->view('merchandises',$merchandises);
        
    }

}