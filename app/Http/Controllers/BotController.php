<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\Board;
use App\Tag;
use App\Library\Services\Bot;


class BotController extends Controller
{
    //
    public function index(Request $request, Bot $bot){
    	$url = "https://api.telegram.org/bot831592934:AAEz6KykUmMg0i8q0HNJ_DwhILCDcnJfMCQ/";
       
        if ($request->isMethod('post')) {
            $chat_id = $request->input('message.chat.id');
            $message = $request->input("message.text");
            if($message == "/start")
            {
                $text = "Тут будет описание работы бота";
                if(\count(Chat::where('chat_id', 388378957)->get())==0)
                {
                    $chat = new Chat();
                    $chat->chat_id = $chat_id;
                    $chat->save();
                }
                $bot->send_message($chat_id, $text, $url."sendMessage");
            }
            else if(preg_match('/^\/watch/', $message))
            {
                $text = '';
                $arr = explode(" ", $message);
                if (count($arr) == 3){
                    $text = "Тредики";
                    $bot->send_message($chat_id, $text, $url."sendMessage");

                }
            }
        }
        else{
            
           echo \count(Chat::where('chat_id', 388378957)->get());

        }
    }
}
