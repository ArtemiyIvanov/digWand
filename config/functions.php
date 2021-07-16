<?php

function loadEnv()
{
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
    $dotenv->load();
}

function getDbParams()
{
    return require __DIR__.'/database.php';
}

