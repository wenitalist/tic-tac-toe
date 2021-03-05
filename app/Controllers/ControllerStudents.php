<?php

namespace App\Controllers;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class ControllerStudents
{
    public function outputInfo()
    {
        require_once '/var/www/wenitalist/vendor/autoload.php';

        $loader = new \Twig\Loader\FilesystemLoader('/var/www/wenitalist/Views');
        $twig = new \Twig\Environment($loader, []);

        $template = $twig->load('test.twig');
        //dump($template);
        echo $template->render();


        /*$con_db = new \App\DB();
        $query = $con_db->query('SELECT * FROM posts');

        $result = $query->fetchAll();
        foreach ($result as $row)
        {
            $str_aut = $row->author;
            $str_aut .= " - ";
            $str_date = $row->date_of_public;
            $str_aut .= $str_date;

            echo("<div>
                  <h2>{$row->title}</h2>
                  <hr>
                  <p>{$row->content}</p>
                  <hr>
                  <p>$str_aut</p>
                  </div>");
        }*/
    }
}