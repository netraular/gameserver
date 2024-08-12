<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $table = 'server';
    protected $fillable = ['game_id', 'status'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function commands()
    {
        return $this->hasMany(GameCommand::class, 'gameserver_id');
    }
}