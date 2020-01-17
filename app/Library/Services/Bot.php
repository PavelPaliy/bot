<?php
namespace App\Library\Services;
 
use \Curl\Curl;


class Bot
{
    public function send_message($chat_id, $text, $url)
    {
      $curl = new Curl();
      $curl->post($url, array(
          'chat_id'=>$chat_id, 
          'text'=>$text
      ));
    }
    public function huy($a){
    	return $a;
    }
}