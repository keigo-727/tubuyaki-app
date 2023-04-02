<?php

namespace App\Http\Controllers\Tweet\Update;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HeaderPutController extends Controller
{
    public function update(Request $request)
    {
        // ユーザーの認証情報を取得する
        $user = User::where('id', Auth::user()->id)->first();

        // アップロードされた画像を保存する
        if ($request->hasFile('header_images')) {
            $image = $request->file('header_images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/header_images', $filename);

            // ユーザーのheader_imageフィールドを更新する
            $user->header_image = 'header_images/' . $filename;
            $user->save();
        }

        // マイページにリダイレクトする
        return redirect()->route('mypage.headerImage.update')->with('success', 'ヘッダー画像を更新しました。');
    }

    public function destroy()
    {
        // ユーザーの認証情報を取得する
        $user = Auth::user();

        // ヘッダー画像を削除する
        Storage::delete('public/' . $user->header_image);
        $user->header_image = null;
        $user->save();

        // マイページにリダイレクトする
        return redirect()->route('mypage.headerImage.delete')->with('success', 'ヘッダー画像を削除しました。');
    }
}