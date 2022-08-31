<?php

namespace framework\libraries;

use framework\libraries\Request;

class Session
{
    /**
     * Note that session_start() already been started once application has been started
     */

    public static function set($key, $value = "")
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key]))
            return $_SESSION[$key];
        else
            return false;
    }

    public static function unset($key)
    {
        unset($_SESSION[$key]);
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function all()
    {
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
    }
}