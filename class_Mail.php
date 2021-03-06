<?php

mail('to whom', 'subject', 'text');

class Mail
{
    static $subject = 'default';
    static $from = 'admin@mydomain.com';
    static $to = 'example@gmail.com';
    static $text = 'letter text';
    static $headers = '';

    static function send()
    {
        self::$subject = '=?utf-8?b?'. base64_encode(self::$subject) .'?=';
        self::$headers = "Content-type: text/html; charset=\"utf-8\"\r\n";
        self::$headers .= "From: ".self::$from."\r\n";
        self::$headers .= "Mime-Version: 1.0\r\n";
        self::$headers .= "Date: ". date('D, d M Y h:i:s O') ."\r\n";
        self::$headers .= "Precedence: bulk\r\n";

        return mail(self::$to, self::$subject, self::$text, self::$headers);
    }

    static function testSend()
    {
        if(mail(self::$to, 'Eng words', 'Eng words')) {
            echo 'Mail has been sent';
        } else {
            echo 'Mail hasn\'t been sent';
        }

        exit;
    }
}
