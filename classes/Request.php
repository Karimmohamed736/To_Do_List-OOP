<?php
namespace classes;

class Request
{
    //1- get
    public function get($key)
    {
        if (isset($_GET[$key])) {
            return $_GET[$key];
        } else {
            return "Not found";
        }
    }

    //2- post
    public function post($key)
    {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        } else {
            return "Not found";
        }
    }

    //3- check
    public function check($key)
    {
        return isset($key);
    }

    //4- filter
    public function filter($key)
    {
        return trim(htmlspecialchars($key));
    }

    //5- redirect
    public function redirect($path)
    {
        header("location:$path");
    }
}
