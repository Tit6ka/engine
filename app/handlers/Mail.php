<?php namespace App\Handlers;

use PHPMailer;
use App\Handlers\Error;

class Mail
{
    public static $mail, $statusCreate;

    public static function create()
    {
        self::$mail = new PHPMailer;

        self::$mail->isSMTP();
        self::$mail->Host = 'smtp.yandex.ru';
        self::$mail->SMTPAuth = true;
        self::$mail->Username = 'admin@union-rp.com';
        self::$mail->Password = 'password';
        self::$mail->SMTPSecure = 'ssl';
        self::$mail->Port = 465;

        self::$mail->CharSet = 'UTF-8';

        self::$statusCreate = true;

        return new self;
    }

    /**
     * @param array $array
     * $array[0] - $from !
     * $array[1] - $frimTitle !
     * $array[2] - $address !
     * $array[3] - $attach url ~
     * $array[4] - $html true/false ~
     * $array[5] - $subject !
     * $array[6] - $body message !
     */
    public static function send(array $array)
    {

        if(!self::$statusCreate)
            Error::create('Не установлен заголовок Mailer', 10);

        self::$mail->setFrom($array[0], $array[1]);

        $address = explode(';', $array[2]);

        if(sizeof($address) > 1) {
            for($i = 0; $i < sizeof($address); $i++)
                self::$mail->addAddress($address[$i]);
        } else {
            self::$mail->addAddress($array[2]);
        }

        if($array[3] != null)
            self::$mail->addAttachment($array[3]);

        self::$mail->isHTML(true);

        self::$mail->Subject = $array[4];

        $body = $array[5]. '<br><br>--<br>Это письмо было отправлено автоматически, отвечать на него не стоит.<br>С уважением,<br>персонал Union Role Play.<br><a href="http://union-rp.com">www.union-rp.com</a><br>--';

        self::$mail->Body = $body;

        if(!self::$mail->send())
            Error::create(self::$mail->ErrorInfo, 11);
    }
}
