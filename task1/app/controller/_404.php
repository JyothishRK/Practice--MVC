<?php

class _404 extends Controller
{
    public function index()
    {
        echo "This is 404 file not found Controller";
        $this->view('_404');
    }
}