<?php

namespace classes;

class Session
{

    //1- start session
    public function __construct()
    {
        session_start();
    }

    //2- set session
    public function SetSession($key, $value)
    {
        // $_SESSION['sucess']= 'Success';  <<<<<
        $_SESSION[$key] = $value;
    }

    //3- get sesssion
    public function GetSession($key)
    {
       if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
    }
    }

    //4- remove session
    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    //5- destroy session
    public function destroy()
    {
        session_destroy();
    }
}
