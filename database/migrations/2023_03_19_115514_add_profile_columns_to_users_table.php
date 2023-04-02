<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileColumnsToUsersTable extends Migration
{
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('user_icon')->nullable();
    });
}
public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('user_icon');
    });
}
}
