<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;

class ProfilePutController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
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