<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;

class ServerController extends Controller
{
    public function index()
    {
        $servers = Server::with(['game', 'commands'])->get();
        return view('servers.index', compact('servers'));
    }
}