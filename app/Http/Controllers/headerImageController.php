<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\HeaderImageUpdateRequest;
use App\Models\User;

class headerImageController extends Controller
{
    public function index()
    {
        // ユーザーの認証情報を取得する
        $user = Auth::user();
        $header_Image = $user->header_image;
         // ユーザーのheader_imageフィールドがnullであれば、デフォルト画像を表示する
        if (is_null($user->header_image))
        {
            $user->header_image = asset('storage/user_icons/default_header_image.png');
        }


        // ユーザーのヘッダー画像を編集するためのビューを返す
        return view('pages.headerImageEdit', ['user' => $user]);
    }
    public function update(HeaderImageUpdateRequest $request)
    {
        // ユーザーの認証情報を取得する
        $user = User::where('id', Auth::user()->id)->first();

        // アップロードされた画像を保存する
        if ($request->hasFile('header_image')) {
            $image = $request->file('header_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/header_image', $filename);

            // ユーザーのheader_imageフィールドを更新する
            $user->header_image = 'storage/header_image/' . $filename;
            $user->save();
        }
        // マイページにリダイレクトする
        return redirect()->route('mypage')->with('feedback.success', 'ヘッダー画像を更新しました。');
    }

    public function delete()
    {
        // ユーザーの認証情報を取得する
        $user = Auth::user();

        // ヘッダー画像を削除する
        Storage::delete('public/' . $user->header_image);
        $user->header_image = null;
        $user->save();

        // マイページにリダイレクトする
        return redirect()->route('mypage')->with('feedback.success', 'ヘッダー画像を削除しました。');
    }
}

