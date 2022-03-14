<?php

namespace controllers;

class HomeController
{
    function index():void {
        require __DIR__ . '/../views/Home/index.php';
    }
}