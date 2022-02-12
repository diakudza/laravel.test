<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->tinyInteger('status')->default('1');
            $table->string('img')->nullable();
            $table->timestamps();
        });

        DB::table('tickets')->insert([
            ['title'=>'ticket1', 'description' => 'smoke from monitor','created_at'=>now(),'updated_at'=>now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
