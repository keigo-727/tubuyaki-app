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
        });
    }
}