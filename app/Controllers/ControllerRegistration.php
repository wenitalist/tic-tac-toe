<?php

namespace App\Controllers;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class ControllerRegistration extends BasicController
{
    public function registrationForm()
    {
        return $this->render('registration.twig', ['session' => $_SESSION]);
    }

    public function execute()
    {
        $_SESSION['successReg'] = false;
        $_SESSION['failedReg'] = false;

        if (isset($_POST['fioReg']) and isset($_POST['passwordReg']) and isset($_POST['loginReg']) and isset($_POST['selectBox']))
        {
            $hashPass = password_hash($_POST['passwordReg'], PASSWORD_BCRYPT);

            $conDb = new \App\DB();
            if ($_POST['selectBox'] == "student" or $_POST['selectBox'] == "parent")
            {
                $bindings = array( 'fio' => $_POST['fioReg'], 'login' => $_POST['loginReg'], 'password' => $hashPass, 'type' => $_POST['selectBox'], 'active' => "yes");
            }
            else
            {
                $bindings = array( 'fio' => $_POST['fioReg'], 'login' => $_POST['loginReg'], 'password' => $hashPass, 'type' => $_POST['selectBox'], 'active' => "no");
            }

            $conDb->query("INSERT INTO users (fio, login, password, type, active) VALUES (:fio, :login, :password, :type, :active)", $bindings);

            $_SESSION['successReg'] = true;

            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
        }
        else
        {
            $_SESSION['failedReg'] = true;
            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}