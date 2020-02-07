<?php
include ('vendor/autoload.php');
include ('TelegramBot.php');
//бот получает сообщение
//бот на любое сообщене отвечает "Hey, dude"

$telegramApi = new TelegramBot();
$updates = $telegramApi->getUpdates();
print_r($updates);

foreach ($updates as $update) {
    $chatId = $update->message->chat->id;
    $telegramApi->sendMessage('Hey, dude', $chatId);
}