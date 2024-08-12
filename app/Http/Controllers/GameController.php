<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'background' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hex_color' => 'required|string|size:7',
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public');
        $backgroundPath = $request->file('background')->store('backgrounds', 'public');

        $game = new Game;
        $game->name = $validatedData['name'];
        $game->description = $validatedData['description'];
        $game->logo = $logoPath;
        $game->background = $backgroundPath;
        $game->hex_color = $validatedData['hex_color'];
        $game->save();

        return redirect()->route('servers.index')->with('success', 'Juego creado exitosamente.');
    }
}