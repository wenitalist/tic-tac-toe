<?php

namespace App;

class Router
{
    public function checkUrl()
    {
        if ($_SERVER['REQUEST_URI'] == "/") {
            $constrStu = new \App\Controllers\ControllerIndex();
            echo $constrStu->viewIndex();
        }
        if ($_SERVER['REQUEST_URI'] == "/students/") {
            $constrStu = new \App\Controllers\ControllerStudents();
            echo $constrStu->getInfo();
        }
        if ($_SERVER['REQUEST_URI'] == "/teachers/") {
            $constrTea = new \App\Controllers\ControllerTeachers();
            echo $constrTea->getInfo();
        }
        if ($_SERVER['REQUEST_URI'] != "/teachers/" and $_SERVER['REQUEST_URI'] != "/students/" and $_SERVER['REQUEST_URI'] != "/") {
            $constrError = new \App\Controllers\ControllerError404();
            echo $constrError->inputError();
        }
    }
}