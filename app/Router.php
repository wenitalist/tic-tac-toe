<?php

namespace App;

class Router
{
    public const massUrl = [
        "/" => [\App\Controllers\ControllerIndex::class, 'viewIndex'],
        "/authorization/" => [\App\Controllers\ControllerAuthorization::class, 'authorizationForm'],
        "/students/" => [\App\Controllers\ControllerStudents::class, 'getInfo'],
        "/teachers/" => [\App\Controllers\ControllerTeachers::class, 'getInfo'],
        "/registration/" => [\App\Controllers\ControllerRegistration::class, 'registrationForm'],
        "/authorizationScript/" => [\App\Controllers\ControllerAuthorization::class, 'execute'],
        "/registrationScript/" => [\App\Controllers\ControllerRegistration::class, 'execute'],
        "/exit/" => [\App\Controllers\ControllerAuthorization::class, 'exit'],
    ];

    public function checkUrl()
    {
        if(isset(self::massUrl[$_SERVER['REQUEST_URI']]))
        {
            $controllerClass = self::massUrl[$_SERVER['REQUEST_URI']][0];
            $method = self::massUrl[$_SERVER['REQUEST_URI']][1];
            $controller = new $controllerClass();
            echo $controller->$method();
        }
        else
        {
            $constrError = new \App\Controllers\ControllerError404();
            echo $constrError->inputError();
        }
    }
}