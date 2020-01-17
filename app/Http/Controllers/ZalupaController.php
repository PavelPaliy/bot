<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\Board;
use App\Tag;


class ZalupaController extends Controller
{
    //
    public function index(){
    	/*$board = Board::where('name', 'b')->get()->first();
    	$chat = Chat::where('chat_id', 388378957)->get()->first();
    	$tag = new Tag();
    	$tag->name = "webm";
    	$tag->chat()->associate($chat);
    	$tag->board()->associate($board);
    	$tag->save();*/
        echo "zalupa";
    }
}
