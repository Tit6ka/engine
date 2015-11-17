<?php namespace App\Handlers;

use App\Handlers\Check;

class Error
{
    public static function create($titleError, $numError, $exception = null)
    {
        $title = 'Ошибка';
        View::create('error.error-app')
            ->with(compact('titleError', 'numError', 'title'))
            ->attach(Check::ajaxRequest(), 'page-head')
            ->render();
        die;
    }

    public static function createJSON()
    {

    }
}