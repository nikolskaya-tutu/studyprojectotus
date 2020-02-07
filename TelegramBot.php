<?php

use GuzzleHttp\Client;

class TelegramBot
{
    protected $token = "1098703953:AAF1qjuQf8xwSqllBGLM3oL5KHbrlNqH904";

    protected function query($method, $params = [])
    {
        $baseUrl = "https://api.telegram.org/bot";
        $url = $baseUrl . $this->token . "/" . $method;

        if(!empty($params)) {
            $url .= "?" . http_build_query($params);
        }
        $client = new Client([
            'base_uri' => $url
        ]);
        $result = $client->request('GET');

        return json_decode($result->getBody());
    }
    
    public function getUpdates()
    {
        $response = $this->query('getUpdates');
        return $response->result;
    }

    public function sendMessage($text, $chatId)
    {
        $this->query('sendMessage', [
            'text' => $text,
            'chat_id' => $chatId
        ]);
    }
}