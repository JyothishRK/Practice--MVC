<?php

class Home extends Controller{
    public function index(){

        $model=new Model;
        $model->test();

        echo "This is the Home controller";
        $this->view('home');
    }
}
