<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include './util.php';

if (!Session::exsists('csrf_token')) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if form was submitted

    //CSRF check
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        // Invalid CSRF token, handle the error
        $name = $_POST['name'];
        $password = $_POST['password'];

        if(Auth::login($name, $password)){
            Session::delete('csrf_token');
            Redirect::to('index.php');
        }else{
            Session::put('login_error', 'Invalid name or password.');
        }

    } else {
        Redirect::forbidden();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LOGIN</title>
</head>

<body>

    <div class="wrap">
        <form class="login-form" method="post">
            <div class="form-header">
                <img src="../assets/img/rings.png" alt="" width="50%">
                <h3>Login</h3>
                <p>Login to access your dashboard</p>
                <p style="color:tomato;"><?php echo Session::flash('login_error') ?></p>
            </div>
            <!--name Input-->
            <div class="form-group">
                <input type="text" name="name" class="form-input" placeholder="admin" required>
            </div>
            <!--Password Input-->
            <div class="form-group">
                <input type="password" name="password" class="form-input" placeholder="password" required>
            </div>
            <input type="hidden" name="csrf_token" value="<?php echo Session::get('csrf_token') ?>">
            <!--Login Button-->
            <div class="form-group">
                <button class="form-button" type="submit" name="SubmitButton">Login</button>
            </div>

        </form>
    </div>

</body>

</html>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        height: 100%;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        ;
        font-size: 1.2rem;
        line-height: 1.6;
        height: 100%;
    }

    .wrap {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fafafa;
    }

    .login-form {
        width: 350px;
        margin: 0 auto;
        border: 1px solid #ddd;
        padding: 2rem;
        background: #ffffff;
    }

    .form-input {
        background: #fafafa;
        border: 1px solid #eeeeee;
        padding: 12px;
        width: 100%;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-button {
        background: #69d2e7;
        border: 1px solid #ddd;
        color: #ffffff;
        padding: 10px;
        width: 100%;
        text-transform: uppercase;
    }

    .form-button:hover {
        background: #69c8e7;
    }

    .form-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .form-footer {
        text-align: center;
    }
</style>