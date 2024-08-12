<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerTable extends Migration
{
    public function up()
    {
        Schema::create('server', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained('game')->onDelete('cascade');
            $table->enum('status', ['on', 'off']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('server');
    }
}