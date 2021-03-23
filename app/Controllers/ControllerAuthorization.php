<?php

namespace App\Controllers;

class ControllerAuthorization extends BasicController
{
    public function authorizationForm()
    {
        return $this->render('authorization.twig', ['session' => $_SESSION]);
    }

    public function exit()
    {
        session_destroy();
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }

    public function execute()
    {
        if (isset($_POST['passwordAuth']) and isset($_POST['loginAuth']))
        {
            $passwordAuth = $_POST['passwordAuth'];
            $loginAuth = $_POST['loginAuth'];

            $conDb = new \App\DB();
            $bindings = array('loginAuth' => $loginAuth);
            $result = $conDb->query("SELECT * FROM users WHERE login=:loginAuth", $bindings);
            $result = $result->fetchAll(\PDO::FETCH_ASSOC);
            $hach_pass_db = $result[0]['password'];
            $chek = password_verify($passwordAuth, $hach_pass_db);

            if ($chek == true and $result[0]['login'] == $loginAuth)
            {
                session_start();
                $type = $result[0]['type'];
                $_SESSION["isAuth"] = true;
                $_SESSION["login"] = $loginAuth;
                $_SESSION["type"] = $type;
                header("Location: /");
                exit();
            }
            else
            {

            }
        }
    }
}