<?php

namespace App\Controllers;

class ControllerIndex extends BasicController
{
    public function viewIndex()
    {
        return $this->render('index.twig', []);
    }
}