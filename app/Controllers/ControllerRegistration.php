<?php

namespace App\Controllers;

class ControllerRegistration extends BasicController
{
    public function registrationForm()
    {
        return $this->render('registration.twig', ['session' => $_SESSION]);
    }

    public function execute()
    {
        if (isset($_POST['passwordReg']) and isset($_POST['loginReg']) and isset($_POST['selectBox']))
        {
            $passwordReg = $_POST['passwordReg'];
            $loginReg = $_POST['loginReg'];
            $selectedBox = $_POST['selectBox'];

            $hashPass = password_hash($passwordReg, PASSWORD_BCRYPT);

            $conDb = new \App\DB();
            if ($_POST['selectBox'] == "student" or $_POST['selectBox'] == "parent")
            {
                $bindings = array( 'login' => $loginReg, 'password' => $hashPass, 'type' => $selectedBox, 'active' => "yes");
            }
            else
            {
                $bindings = array( 'login' => $loginReg, 'password' => $hashPass, 'type' => $selectedBox, 'active' => "no");
            }

            $conDb->query("INSERT INTO users (login, password, type, active) VALUES (:login, :password, :type, :active)", $bindings);

            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}