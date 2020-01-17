<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\Board;
use App\Tag;
use App\Library\Services\Bot;
use \Curl\Curl;


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
                    $board = $arr[1];
                    $tags = explode(";", $arr[2]);
                    $link = 'https://2ch.hk/'.$board.'/catalog_num.json';
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $link);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    $output = curl_exec($ch);
                    curl_close($ch);
                    $board_json = json_decode($output, true);
                    $threads = $board_json['threads'];

                    for($i = 0; $i < count($threads); $i++)
                               {
                                   foreach ($tags as $key => $tag) {
                                       if(preg_match('/'.$tag.'/i', $threads[$i]['comment']))
                                       {
                                           $text .= 'https://2ch.hk/'.$board.'/res/'.explode('/', $threads[$i]['files'][0]['path'])[3].'.html\\n';
                                       }
                                   }
                               }
                    $bot->send_message($chat_id, $text, $url."sendMessage");
                }
            }
        }
        else{
           
           echo 'govno';

        }
    }
}
