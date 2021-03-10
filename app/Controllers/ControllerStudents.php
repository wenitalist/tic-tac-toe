<?php

namespace App\Controllers;

class ControllerStudents extends BasicController
{
    public function getInfo()
    {
        $conDb = new \App\DB();
        $query = $conDb->query('SELECT * FROM users WHERE type=:type', ["type" => 'student']);
        $result = $query->fetchAll();

        echo $this->render('tableStudents.twig', $result);
    }
}