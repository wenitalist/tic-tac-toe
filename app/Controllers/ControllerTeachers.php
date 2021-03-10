<?php

namespace App\Controllers;

class ControllerTeachers extends BasicController
{
    public function getInfo()
    {
        $conDb = new \App\DB();
        $query = $conDb->query('SELECT * FROM users WHERE type=:type', ["type" => 'teacher']);
        $result = $query->fetchAll();
        return $this->render('tableTeachers.twig', ['teachers' => $result]);
    }
}