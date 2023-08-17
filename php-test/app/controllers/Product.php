<?php

class Product extends Controller{
    public function index(){
        echo "This is the Product controller";
        $this->view('product');
    }
}