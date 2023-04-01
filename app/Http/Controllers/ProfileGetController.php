<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileGetController extends Controller
{
    public function index(Request $request, Response $response)
    {
        //ログイン情報を取得している。
        $user = Auth::user(); // Retrieve the logged-in user
        $user = $request->user();
        $name = $user->name;
        $profile = $user->profile;
        $email = $user->email;
        $header_image = $user->header_image; 
        $user_icon = $user->user_icon;

        return view('pages.userProfileEdit', [
            'name' => $name,
            'profile' => $profile,
            'email' => $email,
            'user_icon' => $user_icon,
            'header_image' =>$header_image,
        ]);

    }
}
