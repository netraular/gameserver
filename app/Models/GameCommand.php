<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameCommand extends Model
{
    protected $table = 'game_command';
    protected $fillable = ['gameserver_id', 'command', 'description'];

    public function server()
    {
        return $this->belongsTo(Server::class, 'gameserver_id');
    }
}