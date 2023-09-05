<?php
class Redirect
{
    /**
     * 
     * @param 403
     * 
     */
    public static function login()
    {
        header('Location: 127.0.0.1/dashboard/login.php');
        exit();
    }

    public static function to($location = null)
    {
        header('Location:' . $location);
        exit();
    }

    public static function forbidden()
    {
        header('Location: ../../error/403.html');
        exit();
    }
}
