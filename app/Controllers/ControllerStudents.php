<?php


namespace App\Controllers;


class ControllerStudents
{
    public function outputInfo()
    {
        $con_db = new \App\DB();
        $query = $con_db->query('SELECT * FROM posts');

        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($result as $row)
        {
            $str_aut = $row['author'];
            $str_aut .= " - ";
            $str_date = $row['date_of_public'];
            $str_aut .= $str_date;

            echo("<div>
                  <h2>{$row['title']}</h2>
                  <hr>
                  <p>{$row['content']}</p>
                  <hr>
                  <p>$str_aut</p>
                  </div>");
        }
    }
}