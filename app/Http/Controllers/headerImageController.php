<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;

class HeaderImageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.headerImageEdit', ['user' => $user]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        // アップロードされた画像を保存する
        if ($request->hasFile('header_image')) {
            $image = $request->file('header_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/header_images', $filename);

            // ユーザーのheader_imageフィールドを更新する
            $user->header_image = 'header_images/' . $filename;
            dd($user);
            $user->save();

        }

        return redirect()->route('headerImage.index')->with('success', 'ヘッダー画像を更新しました。');
    }

    public function destroy()
    {
        $user = Auth::user();

        // ヘッダー画像を削除する
        Storage::delete('public/' . $user->header_image);
        $user->header_image = null;
        $user->save();
        return redirect()->route('headerImage.index')->with('success', 'ヘッダー画像を削除しました。');
    }
}
