<?php

namespace App\Controllers;

class ControllerStudents
{
    public function outputInfo()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../Views');
        $twig = new \Twig\Environment($loader, []);

        $con_db = new \App\DB();
        $query = $con_db->query('SELECT * FROM posts');

        $result = $query->fetchAll();
        foreach ($result as $row) {
            $str_title = $row->title;
            $str_content = $row->content;

            $str_aut = $row->author;
            $str_aut .= " - ";
            $str_date = $row->date_of_public;
            $str_aut .= $str_date;

            $template = $twig->load('tablePosts.twig');
            echo $template->render(['title' => $str_title, 'content' => $str_content, 'authDate' => $str_aut]);
        }
    }
}