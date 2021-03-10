<?php

namespace App\Controllers;

class ControllerStudents extends BasicController
{
    public function getInfo()
    {
        $conDb = new \App\DB();
        $query = $conDb->query('SELECT * FROM users WHERE type=:type', ["type" => 'student']);
        $result = $query->fetchAll();

        echo $this->render('tablePosts.twig', $result);

        //foreach ($result as $row) {
            //$strLogin = $row->login;
            //$strType = $row->type;
            //$strId = $row->id;

            //$mass = ['id' => $strId, 'login' => $strLogin, 'type' => $strType];
            //echo $this->render('tablePosts.twig', $mass);

            //$template = BasicController::outputInfo()->load('tablePosts.twig');
            //echo $template->render(['title' => $strTitle, 'content' => $strContent, 'authDate' => $strAut]);
        //}
    }
}