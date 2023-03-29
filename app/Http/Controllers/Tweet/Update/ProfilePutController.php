<?php

namespace App\Http\Controllers\tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;

class ProfilePutController extends Controller
{
    public function update(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        // アイコン画像をアップロードする
        if ($request->hasFile('user_icon'))
        {
            // 以前の画像を削除する
            Storage::delete($user->user_icon_path);
            // 新しい画像を保存する
            $path = $request->file('user_icon')->store('public/user_icons');
            $user->user_icon_path = $path;
        }
        // nameを更新
        $user->name = $request->input('name');
        // メールアドレスを更新
        $user->email = $request->input('email');
        // プロフィールを更新
        $user->profile = $request->input('profile');
        $user->save();
        return redirect()->route('profile.edit.put')->with('feedback.success',"プロフィールを更新しました。");
    }
}