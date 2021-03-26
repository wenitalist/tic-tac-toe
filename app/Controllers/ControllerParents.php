<?php

namespace App\Controllers;

class ControllerParents extends BasicController
{
    public function getInfo()
    {
        if ($_SESSION['type'] == 'admin')
        {
            $conDb = new \App\DB();
            $query = $conDb->query('SELECT * FROM users WHERE type=:type', ["type" => 'parent']);
            $result = $query->fetchAll();
            return $this->render('tableParents.twig', ['parents' => $result, 'session' => $_SESSION]);
        }
    }
}