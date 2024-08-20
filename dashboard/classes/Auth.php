<?php
class Auth
{

    public static function login($name, $password)
    {
        $user = Database::db()->table('users')->where('name', $name)->get();
        
        if ($user && password_verify($password, $user->password)) {
            session_regenerate_id(true);

            $_SESSION['user'] = ['id' => $user->id, 'name' => $user->name];
            $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['last_activity'] = time();
            setcookie('jwt', Token::generateJWT(['id' => $user->id, 'name' => $user->name]), 
                time() + 86400, '/', '', true, true);

                return true;
        }
        return false;

    }

    public static function user()
    {
        // Check if the JWT exists in the request headers, cookies, or local storage
        if (!empty($_COOKIE['jwt'])) {
            $jwt = $_COOKIE['jwt'];

            // Validate the token
            $userData = Token::validateToken($jwt);
            if (!$userData) {
                die("Invalid or expired token. Please log in again.");
                return false;
            }
            return true;
            
        } else {
            // JWT is missing
            //Redirect::to('login.php');
            return false;
        }
    }
}
