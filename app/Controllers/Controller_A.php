<?php

namespace App\Controllers;

use Jenssegers\Blade\Blade;

abstract class Controller_A
{
    protected $title;

    public function Request($action)
    {
        session_start();
        $this->before();
        $this->$action();
        session_write_close();
    }
    protected function before()
    {
        $this->title = 'E-shop';
    }

    public function render($name, $args = [])
    {
        $blade = new Blade(VIEWS_FOLDER_PATH, CACHE_FOLDER_PATH);
        echo $blade->render($name, $args);
    }
    public function __call($name, $arguments)
    {
        $this->title = 'Not Found';
        return $this->render('404', ['title'=>$this->title]);

    }
    
}