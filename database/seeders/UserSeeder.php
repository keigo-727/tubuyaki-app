<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use App\Models\User;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(4)->create()->each(function ($user)
        {
            // ランダムなファイル名を生成
            $fileName = Str::random(40) . '.png';
            // ダミーアイコンをstorage/app/public/images以下にコピー
            $imagePath = storage_path('app/public/images/dummy-icon.png');
            $destinationPath = storage_path('app/public/images/' . $fileName);
            copy($imagePath, $destinationPath);
            // ユーザーのアイコンとして登録
            $user->user_icon = $fileName;
            $user->save();
        });
    }
}