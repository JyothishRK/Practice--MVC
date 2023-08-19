<?php

class Analysis extends Controller
{
    public function index(){
        echo 'Inside Data analysis controller';
        $this->view('data');
    }
}
