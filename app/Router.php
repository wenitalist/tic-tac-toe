<?php

namespace App;

class Router
{
    public function checkUrl()
    {
        if ($_SERVER['REQUEST_URI'] == "/students") {
            $constrStu = new \App\Controllers\ControllerStudents();
            $constrStu->outputInfo();
        }
    }
}