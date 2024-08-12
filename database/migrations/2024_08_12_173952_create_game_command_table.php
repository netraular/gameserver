<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameCommandTable extends Migration
{
    public function up()
    {
        Schema::create('game_command', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gameserver_id')->constrained('server')->onDelete('cascade');
            $table->string('command');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_command');
    }
}
