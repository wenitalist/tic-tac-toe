<?php

namespace App;

class Router
{
    public function checkUrl()
    {
        if ($_SERVER['REQUEST_URI'] == "/") {
            //index.php
        }
        if ($_SERVER['REQUEST_URI'] == "/students") {
            $constrStu = new \App\Controllers\ControllerStudents();
            echo $constrStu->getInfo();
        }
        if ($_SERVER['REQUEST_URI'] == "/teachers") {
            $constrTea = new \App\Controllers\ControllerTeachers();
            echo $constrTea->getInfo();
        }
        else {
            //header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
            $constrError = new \App\Controllers\ControllerError404();
            echo $constrError->inputError();
        }
    }
}