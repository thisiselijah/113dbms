<?php

class PageController extends Controller{
    public function showHome(){
        $this->view('homepage');
    }

    public function showLoginPage(){
        $this->view('LogIn');
    }
}