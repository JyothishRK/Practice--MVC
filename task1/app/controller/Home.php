<?php

class Home extends Controller
{
    public function index()
    {
        echo "This is home Controller";
        $this->view('home');
    }
}