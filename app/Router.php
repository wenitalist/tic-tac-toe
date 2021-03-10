<?php

namespace App;

class Router
{
    public function checkUrl()
    {
        if ($_SERVER['REQUEST_URI'] == "/students") {
            $constrStu = new \App\Controllers\ControllerStudents();
            echo $constrStu->getInfo();
        }
        if ($_SERVER['REQUEST_URI'] == "/teachers") {
            $constrStu = new \App\Controllers\ControllerTeachers();
            echo $constrStu->getInfo();
        }
    }
}