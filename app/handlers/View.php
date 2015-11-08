<?php namespace App\Handlers;

use App\Handlers\Error;

class View
{
    protected static $variable;
    protected static $path;
    protected static $attachStatus;
    protected static $attachPath;
    protected static $jsonStatus;
    protected static $jsonContent;

    public static function create($nameView)
    {
        $nameView = explode('.', $nameView);
        if(isset($nameView[1]))
            $pathView = 'resource/view/pages/'.$nameView[0].'/'.$nameView[1].'.php';
        else
            $pathView = 'resource/view/pages/'.$nameView[0].'.php';
        if(!file_exists($pathView))
            Error::create('Template file not found', 404, new \Exception());
        self::$path = $pathView;
        return new self;
    }

    public function with($variable)
    {
        if(!empty($variables))
            Error::create('Variable not found', 404, new \Exception());
        self::$variable = $variable;
        return new self;
    }

    public function attach($status, $path = null)
    {
        if($status === true) {
            self::$attachStatus = true;
            if($path == null) {
                self::$attachPath = 'resource/view/page-heads/';
                if(!file_exists(self::$attachPath))
                    Error::create('Attach file not found', 404, new \Exception());
            } else {
                self::$attachPath = 'resource/view/'.$path.'/';
                if(!file_exists(self::$attachPath))
                    Error::create('Attach file not found', 404, new \Exception());
            }
        }
        return new self;
    }

    public function getJSON($status, $arrayData)
    {
        if($status === true) {
            self::$jsonStatus = true;
            $fileContent = file_get_contents(self::$path);
            $data = ['content' => $fileContent];
            if(!empty($arrayData)) $data[] = $arrayData;
            self::$jsonContent = json_encode($data);
        }
        return new self;
    }

    public function render()
    {
        if(self::$jsonStatus) {
            echo self::$jsonContent;
            return false;
        }
        if(!empty(self::$variable)) extract(self::$variable);
        $content = self::$path;
        if(self::$attachStatus)
            include self::$attachPath.'head.php';
    }
}