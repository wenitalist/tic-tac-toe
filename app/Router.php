<?php


namespace App;

use App\Controllers\ControllerStudents;

class Router
{
    public function checkUrl()
    {
        if ($_SERVER['REQUEST_URI'] == "/students")
        {
            $constr_stu = new \App\Controllers\ControllerStudents();
            $constr_stu->outputInfo();
        }
    }
}