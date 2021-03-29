<?php

namespace App\Controllers;

class ControllerPersonalArea extends BasicController
{
    public function in()
    {
        return $this->render('personalArea.twig', ['session' => $_SESSION]);
    }

    public function changePass()
    {
        if ($_SESSION['statusAuth'] == true)
        {
            $_SESSION['changePassSuccessful'] = false;
            $_SESSION['changePassNewConfirmIncorrect'] = false;
            $_SESSION['changePassOldPassIncorrect'] = false;
            $_SESSION['changePassNonAuthUser'] = false;

            $oldPass = $_POST['oldPass'];
            $newPass = $_POST['newPass'];
            $loginAuth = $_SESSION['login'];
            $confirmPass = $_POST['confirmPass'];
            $newHash = password_hash($_POST['newPass'], PASSWORD_BCRYPT);

            $conDb = new \App\DB();
            $bindings = array('loginAuth' => $loginAuth);
            $result = $conDb->query("SELECT * FROM users WHERE login=:loginAuth", $bindings);
            $result = $result->fetchAll(\PDO::FETCH_ASSOC);
            $hachPassDb = $result[0]['password'];

            if (password_verify($oldPass, $hachPassDb) == true)
            {
                if ($newPass == $confirmPass)
                {
                    $bindings = array( 'password' => $newHash, 'login' => $loginAuth );
                    $conDb->query("UPDATE users SET password =:password WHERE login=:login", $bindings);
                    $_SESSION['changePassSuccessful'] = true;
                    header("Location: ".$_SERVER['HTTP_REFERER']);
                    exit();
                }
                else
                {
                    $_SESSION['changePassNewConfirmIncorrect'] = true;
                    header("Location: ".$_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
            else
            {
                $_SESSION['changePassOldPassIncorrect'] = true;
                header("Location: ".$_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        else
        {
            $_SESSION['changePassNonAuthUser'] = true;
            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function changeFio()
    {
        if ($_SESSION['statusAuth'] == true)
        {
            $_SESSION['changeFioSuccessful'] = false;
            $_SESSION['changeFioOldIncorrect'] = false;
            $_SESSION['changeFioNonAuthUser'] = false;

            $oldFio = $_POST['oldFio'];
            $newFio = $_POST['newFio'];
            $loginAuth = $_SESSION['login'];

            $conDb = new \App\DB();
            $bindings = array('loginAuth' => $loginAuth);
            $result = $conDb->query("SELECT * FROM users WHERE login=:loginAuth", $bindings);
            $result = $result->fetchAll(\PDO::FETCH_ASSOC);
            $fioDb = $result[0]['fio'];

            if ($fioDb == $oldFio)
            {
                $bindings = array( 'fio' => $newFio, 'login' => $loginAuth );
                $conDb->query("UPDATE users SET fio =:fio WHERE login=:login", $bindings);
                $_SESSION['changeFioSuccessful'] = true;
                $_SESSION['fio'] = $newFio;
                header("Location: ".$_SERVER['HTTP_REFERER']);
                exit();
            }
            else
            {
                $_SESSION['changeFioOldIncorrect'] = true;
                header("Location: ".$_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        else
        {
            $_SESSION['changeFioNonAuthUser'] = true;
            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}