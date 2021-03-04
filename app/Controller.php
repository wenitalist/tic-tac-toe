<?php


namespace App;


class Controller
{
    public function check_url(string $url)
    {
        if ($this->$url == "/student")
        {
            // тут код который вызывает класс, который будет выводить всю страницу students
        }
    }
}