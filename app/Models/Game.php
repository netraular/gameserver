<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'game';
    protected $fillable = ['name', 'description', 'logo', 'background', 'hex_color'];
}