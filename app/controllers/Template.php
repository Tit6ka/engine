<?php namespace App\Controllers;

use App\Handlers\Error;
use App\Handlers\View;
use Illuminate\Routing\Controller;

class Template extends Controller
{
    public $qStatus;
    public function __construct()
    {
        if(isset($_POST['method']))
            $this->qStatus = false;
        else
            $this->qStatus = true;
    }

    public function main()
    {
        View::create('main')
            ->with([
                'title' => 'Union | Главная'
            ])
            ->attach(true, 'page-head')
            ->getJSON(false, ['title' => 'Union RolePlay | Главная'])
            ->render();
    }
}