<?php namespace App\Controllers;

use App\Handlers\Error;
use App\Handlers\View;
use App\Handlers\Check;
use Illuminate\Routing\Controller;

class Template extends Controller
{

    public function main()
    {
        View::create('main')
            ->with([
                'title' => 'Union | Главная'
            ])
            ->attach(Check::ajaxRequest(), 'page-head')
            ->render();
    }
}