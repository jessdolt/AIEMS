<?php

namespace framework\libraries;

use framework\libraries\Input;
use framework\libraries\Session;

class Request
{
    private static $_input;

    private static $has_message = false;

    /**
     * Will return an error when token mismatch.
     * 
     */
    public static function handle()
    {

        if (self::post() && !CSRF::validate(self::post('xs-token'))) {
            return Helper::showError(["Token Mismatch"]);
        }
    }

    public static function post($key = null)
    {
        self::$_input = new Input();
        return self::$_input->post($key);
    }

    public static function get($key = null)
    {
        self::$_input = new Input();
        return self::$_input->get($key);
    }

    public static function server($key = null)
    {
        self::$_input = new Input();
        return self::$_input->server($key);
    }

    public static function setMessage(string $message)
    {

        Session::set('setMsg', $message);
    }

    public static function hasMessage()
    {
        if (Session::get('setMsg')) {
            self::$has_message = true;
        } else {
            self::$has_message = false;
        }

        return self::$has_message;
    }

    public static function getMessage()
    {
        echo Session::get('setMsg');
        Session::unset('setMsg');
    }

    /**
     *  Middleware is like the 'security guard' of our routes/pages.
     *  It accepts two parameters `bool` and `route`.
     * 
     * If the first parameter is false, then it will redirect to the route given
     */
    public static function middleware($bool, $location = "/")
    {
        if (!$bool) {
            header('location: ' . $location);
        }
    }

    public static function uploader($files, $name = "")
    {
        if (isset($files) && $files['error'] == 0) {
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
            $filename = $files["name"];
            $filetype = $files["type"];
            $filesize = $files["size"];

            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

            $maxsize = 5 * 1024 * 1024;
            if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

            // Verify MYME type of the file
            if (in_array($filetype, $allowed)) {

                $dir = ROOT . "public/uploads/";



                move_uploaded_file($files["tmp_name"], $dir . $name . ".jpg");
                return 1;
            } else {
                die("Error: There was a problem uploading your file. Please try again.");
            }
        }
    }
}