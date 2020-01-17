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
    	$method = $request->method();
        if ($request->isMethod('post')) {
            
        }
        else{
            echo $bot->doSomethingUseful();
        }
    }
}
