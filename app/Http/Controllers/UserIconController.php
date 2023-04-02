<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;

class UserIconController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages/userIconEdit', ['user' => $user]);
        
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // アップロードされた画像を保存する
        if ($request->hasFile('user_icon')) {
            $image = $request->file('user_icon');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/user_icons', $filename);

            // ユーザーのuser_iconフィールドを更新する
            $user->user_icon = 'storage/user_icons/' . $filename;
            $user->save();
        }

        return redirect()->route('mypage.userIcon.edit')->with('feedback.success',"アイコンを更新しました。");
    }
}
