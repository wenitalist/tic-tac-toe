<?php

namespace App\Controllers;

class ControllerTeachers extends BasicController
{
    public function getInfo()
    {
        $conDb = new \App\DB();
        $query = $conDb->query('SELECT * FROM users WHERE type=:type', ["type" => 'teacher']);
        $result = $query->fetchAll();

        echo $this->render('tableTeachers.twig', $result);
    }
}