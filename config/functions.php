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

function env(string $key) 
{
    return ($_ENV[$key]) ? $_ENV[$key] : false;
}