<?php

namespace App\Controllers;

class ControllerStudents extends BasicController
{
    public function getInfo()
    {
        $conDb = new \App\DB();
        $query = $conDb->query('SELECT * FROM posts');

        $result = $query->fetchAll();
        foreach ($result as $row) {
            $strTitle = $row->title;
            $strContent = $row->content;

            $strAut = $row->author;
            $strAut .= " - ";
            $strDate = $row->date_of_public;
            $strAut .= $strDate;

            $mass = ['title' => $strTitle, 'content' => $strContent, 'authDate' => $strAut];

            return $this->render('tablePosts.twig', $mass);

            //$template = BasicController::outputInfo()->load('tablePosts.twig');
            //echo $template->render(['title' => $strTitle, 'content' => $strContent, 'authDate' => $strAut]);
        }
    }
}