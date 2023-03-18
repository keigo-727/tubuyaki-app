<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Tweet;
use App\Models\User;

class MypageController extends Controller
{
    public function index(Request $request, Response $response)
    {
        //ログイン情報を取得している。
        $user = $request->user();
        $tweets = $user->tweets()->latest()->get();
        //ユーザー情報に紐づくtweetとユーザー情報を渡す。
        return view('pages/mypage', [
            'user' => $user,
            'tweets' => $tweets,
        ]);
    }
}
