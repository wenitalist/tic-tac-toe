<?php

namespace App\Controllers;

class ControllerStudents extends BasicController
{
    public function getInfo()
    {
        if ($_SESSION['type'] == 'admin')
        {
            $conDb = new \App\DB();
            $query = $conDb->query('SELECT * FROM users WHERE type=:type', ["type" => 'student']);
            $result = $query->fetchAll();
            return $this->render('tableStudents.twig', ['students' => $result, 'session' => $_SESSION]);
        }
    }
}