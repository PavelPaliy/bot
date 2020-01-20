<?php

namespace App\Jobs;
use App\Library\Services\Bot;
use App\Chat;

public function __construct(){
	$bot = new Bot();
	$url = "https://api.telegram.org/bot831592934:AAEz6KykUmMg0i8q0HNJ_DwhILCDcnJfMCQ/";
	$chat_id = Chat::where('id', 1)->firstOrFail()->chat_id;
	$text = 'huy';
    $bot->send_message($chat_id, $text, $url."sendMessage");
}