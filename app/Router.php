<?php

namespace App;

class Router
{
    public function checkUrl()
    {
        if ($_SERVER['REQUEST_URI'] == "/authorization/") {
            $constrAuth = new \App\Controllers\ControllerAuthorization();
            echo $constrAuth->authorizationForm();
        }
        if ($_SERVER['REQUEST_URI'] == "/") {
            $constr = new \App\Controllers\ControllerIndex();
            echo $constr->viewIndex();
        }
        if ($_SERVER['REQUEST_URI'] == "/students/") {
            $constrStu = new \App\Controllers\ControllerStudents();
            echo $constrStu->getInfo();
        }
        if ($_SERVER['REQUEST_URI'] == "/teachers/") {
            $constrTea = new \App\Controllers\ControllerTeachers();
            echo $constrTea->getInfo();
        }
        if ($_SERVER['REQUEST_URI'] != "/teachers/" and $_SERVER['REQUEST_URI'] != "/students/" and $_SERVER['REQUEST_URI'] != "/" and $_SERVER['REQUEST_URI'] != "/authorization/") {
            $constrError = new \App\Controllers\ControllerError404();
            echo $constrError->inputError();
        }
    }
}