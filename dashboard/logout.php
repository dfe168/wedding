<?php
session_reset();

unset($_COOKIE['jwt']);

setcookie('jwt',null,-1,'/');

header('Location: login.php');
