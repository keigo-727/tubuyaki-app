<?php
namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use App\Services\UserService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService, UserService $userService)
    {
        $tweets = $tweetService->getTweets();

        foreach ($tweets as $tweet) 
        {
            $user = $userService->getUserById($tweet->user_id);
            $tweet->user_icon = $user->user_icon;
            $tweet->user_name = $user->name;
            
            if (is_null($tweet->user_icon)) 
            {
                $tweet->user_icon = asset('storage/user_icons/default_icon.png');
            }
            $tweet->created_at_string = $tweet->created_at->format('Y年m月d日 H時i分');
        }
        return view('tweet.index')->with('tweets', $tweets);
    }
    
}
