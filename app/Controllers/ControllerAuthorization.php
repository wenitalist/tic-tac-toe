<?php

namespace App\Controllers;

class ControllerAuthorization extends BasicController
{
    public function authorizationForm()
    {
        return $this->render('authorization.twig', []);
    }
}