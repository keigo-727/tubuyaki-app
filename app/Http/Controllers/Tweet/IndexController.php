<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetServise;
use Illuminate\Http\Request;

// use Illuminate\Http\Response;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,TweetServise $TweetServise)
    {
        // dd()　ヘルパー関数　その場で処理を中断して変数の内容出力する。関数チェック
        
        $tweetServise = new TweetServise();
        $tweets = $tweetServise->getTweets();
        return view('tweet.index')
        ->with('tweets',$tweets);
    }
}
