<?php

class Home extends Controller
{
    public function index()
    {
        echo "This is home Controller";
        $this->view('home');
        $model = new Model();
        $arr['Name']='Peter';
        $arr['Marks']=45;
        $model->delete(4); 
    }
}