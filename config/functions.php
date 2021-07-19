<?php

use Dotenv\Dotenv;

function loadEnv()
{
    $dotenv = Dotenv::createImmutable(__DIR__.'/..');
    $dotenv->load();
}

function getDbParams()
{
    return require __DIR__.'/database.php';
}

function get_env(string $key) 
{
    return ($_ENV[$key]) ? $_ENV[$key] : false;
}

function get(string $key) 
{
    return (isset($_GET[$key])) ? $_GET[$key] : false;
}

function post(string $key) 
{
    return (isset($_POST[$key])) ? $_POST[$key] : false;
}