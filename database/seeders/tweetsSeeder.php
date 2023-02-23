<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Suppoort\Facades\DB;
use Illuminate\Suppoort\Str;

class tweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    DB::table('tweets')->insert([
        'content' => Str::random(100),
        'creted_at' =>now(),
        'updated_at' =>now(),
    ]);
    }
}
