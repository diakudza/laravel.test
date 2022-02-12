<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('is_admin');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['name'=>'admin','password'=>Hash::make('123'),'email' => 'admin@mail.com', 'is_admin' => '1'],
            ['name'=>'user1','password'=>Hash::make('123'),'email' => 'user@mail.com', 'is_admin' => '0'],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
