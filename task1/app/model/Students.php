<?php

class Students
{
    use Model;
    protected $table = 'students';
    protected $allowedColumns=[
        'name',
        'age',
    ];
}