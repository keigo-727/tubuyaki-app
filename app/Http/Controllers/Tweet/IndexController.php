<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use Illuminate\Http\Request;

// use Illuminate\Http\Response;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,TweetService $tweetService)
    {
        // dd()　ヘルパー関数　その場で処理を中断して変数の内容出力する。関数チェック
        
        $tweets = $tweetService->getTweets();
        return view('tweet.index')->with('tweets',$tweets);
    }
}
