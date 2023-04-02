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
        foreach ($tweets as $tweet) {
            $tweet->created_at_string = $tweet->created_at->format('Y-m-d H:i');
            // 作成日時を使って何かしらの処理を行う
        }
        $user_icon = $user->user_icon;
        $name = $user->user_name;
        $header_Image = $user->header_image;
        //ユーザー情報に紐づくtweetとユーザー情報を渡す。
        return view('pages/mypage', [
            'user' => $user,
            'tweets' => $tweets,
            'user_icon' => $user_icon,
            'name' => $name,
            'header_image' => $header_Image,

        ]);
    }
}
