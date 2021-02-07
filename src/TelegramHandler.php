<?php

namespace App;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;

class TelegramHandler extends AbstractProcessingHandler
{
    private $token;
    private $chat_id;

    public function __construct($token, $chat_id , $level = Logger::DEBUG, bool $bubble = true)
    {
        $this->token = $token;
        $this->chat_id = $chat_id;
        parent::__construct($level, $bubble);
    }
    protected function write(array $record): void
    {
        $ch = curl_init();
        $url = "https://api.telegram.org/bot{$this->token}/sendMessage?chat_id={$this->chat_id}&text={$record['formatted']}";
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_exec($ch);
    }
}

