# **Telegram Logger**
Send error logs from your project to Telegram bot. Based on monolog/monolog

## **Install with Composer**

`composer require swarletta/telegram-logger`

## **Initialization**

First, you need to create an instance of TelegramHandler class.
You will need a token to your Telegram Bot, chat ID to create the instance. Error LEVEL is set to DEBUG by default.

`$handler = new TelegramHandler($token, $chat_id, Logger::DEBUG);`

Then call method setFormatter to create a message.

`$handler->setFormatter(new LineFormatter("%message%", null, true));`

## **Here is an example of Logger call**

``` php
<?php

require 'vendor/autoload.php';

use App\TelegramHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Logger;

$token = '000000000:XXXXX-xxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$chat_id = 999999999;
$log = new Logger('telegram-channel');

$handler = new TelegramHandler($token, $chat_id, Logger::DEBUG);
$handler->setFormatter(new LineFormatter("%message%", null, true));
$log->pushHandler($handler);

$log->debug('Test message');
```

