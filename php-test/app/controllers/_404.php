<?php

class _404 extends Controller{
    public function index(){
        echo "This is the 404 Page not found controller";
        $this->view('404'); 
    }
}