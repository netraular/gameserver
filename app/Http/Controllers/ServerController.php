<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;

class ServerController extends Controller
{
    public function index()
    {
        $servers = Server::with(['game', 'commands'])->get();
        $games = \App\Models\Game::all();
        return view('servers.index', compact('servers', 'games'));
    }
    public function create()
    {
        $games = \App\Models\Game::all();
        return view('servers.create', compact('games'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'game_id' => 'required|exists:games,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $server = new \App\Models\Server;
        $server->game_id = $validatedData['game_id'];
        $server->status = 'off'; // Puedes establecer el estado inicial como 'off'
        $server->save();

        return redirect()->route('servers.index')->with('success', 'Servidor creado exitosamente.');
    }
}