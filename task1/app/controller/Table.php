<?php

class Table extends Controller
{
    public function index()
    {
        echo "This is Table Controller";
        $this->view('table');
    }
}