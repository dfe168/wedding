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
        header("Location:" .$_ENV("ROOT"). "/dashboard/login.php");
        exit();
    }

    public static function to($location = null)
    {
        header('Location:' . $location);
        exit();
    }

    public static function forbidden()
    {
        header("Location:" .$_ENV("ROOT"). "/error/403.html");
        exit();
    }
}
