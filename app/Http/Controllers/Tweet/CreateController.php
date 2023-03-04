<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;


class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(CreateRequest $request)
    {
        $tweet = new tweet;
        $tweet-> content = $request->tweet();
        $tweet-> save();
        return redirect() -> route('tweet.index');
    }
}
