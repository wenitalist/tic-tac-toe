<?php

namespace App\Controllers;

class ControllerActivateTeachers
{
    public function execute()
    {
        $c_mass = $_POST['checkbox_mass'];
        if ($_SESSION['type'] == 'admin')
        {
            if(empty($c_mass))
            {
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
            else
            {
                foreach ($c_mass as $row)
                {
                    $conDb = new \App\DB();
                    $bindings = array( 'id' => $row );
                    $conDb->query("UPDATE users SET active = 'yes' WHERE id=:id", $bindings);
                }
            }

            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}