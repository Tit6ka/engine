<?php namespace App\Controllers;

use App\Handlers\Error;
use App\Handlers\View;
use App\Handlers\Mail;
use Symfony\Component\HttpFoundation\Request;
use App\Handlers\Check;
use Illuminate\Routing\Controller;

class Template extends Controller
{

    public function main()
    {
        /*Mail::create()->send([
            'admin@union-rp.com',
            'Union Role Play',
            'artur.irinatov@mail.ru;tit6ka5678@gmail.com',
            'resource/assets/img/bg1.jpg',
            'Проверка',
            'И ведь работает же ыы'
        ]);*/
        View::create('main')
            ->with([
                'title' => 'Главная'
            ])
            ->attach(Check::ajaxRequest(), 'page-head')
            ->render();
    }

    public function api()
    {
        var_dump(Request::createFromGlobals());
    }
}