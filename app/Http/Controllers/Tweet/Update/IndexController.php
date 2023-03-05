<?php

namespace App\Http\Controllers\tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Tweet;
use Symfony\Component\Httpkernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        $tweetId = (int) $request->route('tweetId');
        $tweet = Tweet::where('Id',$tweetId)->firstOrFail();
        return view('tweet.update')->with('tweet',$tweet);
    }
}
