<?php

class Controller
{
    public function view($name)
    {
        $filename = '../app/view/'.$name.'.view.php';
        if(file_exists($filename))
        {
            require $filename;
        }
        else
        {
            $name='_404';
            require $file_name;
        }
    }
}