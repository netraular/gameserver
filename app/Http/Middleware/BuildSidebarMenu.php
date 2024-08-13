<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Models\Game;
use Illuminate\Support\Facades\Event;

class BuildSidebarMenu
{
    public function handle(Request $request, Closure $next)
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            $games = Game::all();

            foreach ($games as $game) {
                $event->menu->add([
                    'text' => $game->name,
                    'url' => route('admin.game.show', $game->id),
                    'icon' => 'fas fa-fw fa-gamepad',
                ]);
            }
        });

        return $next($request);
    }
}