<?php namespace App\Handlers;

class Check
{
    public static function ajaxRequest()
    {
        if(isset($_POST['method']))
            return false;
        else
            return true;
    }
}