<?php namespace App\Handlers;

class Error
{
    public static function create($titleError, $numError, $exception = null)
    {
        $title = 'Ошибка';
        if(isset($_POST['ajax']))
            $qStatus = false;
        else
            $qStatus = true;
        View::create('errors.error-app')
            ->with(compact('titleError', 'numError', 'title'))
            ->attach($qStatus, 'page-head')
            ->render();
        die;
    }
}