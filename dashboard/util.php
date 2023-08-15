<?php
session_start();

require_once "vendor/autoload.php";

//init .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
?>



