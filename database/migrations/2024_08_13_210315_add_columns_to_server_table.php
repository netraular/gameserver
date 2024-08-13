<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToServerTable extends Migration
{
    public function up()
    {
        Schema::table('server', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('ip');
            $table->integer('puerto');
            $table->text('descripcion');
        });
    }

    public function down()
    {
        Schema::table('server', function (Blueprint $table) {
            $table->dropColumn(['nombre', 'ip', 'puerto', 'descripcion']);
        });
    }
}