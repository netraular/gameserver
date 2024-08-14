<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Models\Game;
use App\Models\Server;
use Illuminate\Support\Facades\Event;

class BuildSidebarMenu
{
    public function handle(Request $request, Closure $next)
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            $games = Game::all();

            foreach ($games as $game) {
                $servers = Server::where('game_id', $game->id)->get();
                $submenu = [];
                $totalServersCount = $servers->count();
                $activeServersCount = $servers->where('status', 'on')->count();

                foreach ($servers as $server) {
                    $icon = $server->status === 'on' ? 'far fa-dot-circle' : 'far fa-circle';
                    $iconColor = $server->status === 'on' ? 'success' : 'danger';

                    $submenu[] = [
                        'text' => $server->nombre, // Asegúrate de usar el nombre correcto de la columna
                        'url' => route('admin.server.show', $server->id),
                        'icon' => $icon,
                        'icon_color' => $iconColor,
                    ];
                }

                // Add "Crear servidor" item at the end of the submenu
                $submenu[] = [
                    'text' => 'Crear servidor',
                    'url' => route('servers.create', ['game_id' => $game->id]),
                    'icon' => 'fas fa-fw fa-plus',
                ];

                // Add "Editar juego" item at the end of the submenu
                $submenu[] = [
                    'text' => 'Editar juego',
                    'url' => route('games.edit', $game->id),
                    'icon' => 'fas fa-fw fa-edit',
                    'class' => 'text-bold', // Clase predefinida de AdminLTE para texto en negrita
                ];

                // Determine label color based on active servers count
                $labelColor = $activeServersCount > 0 ? 'success' : 'danger';

                $event->menu->add([
                    'text' => $game->name,
                    'icon' => 'fas fa-fw fa-gamepad',
                    'icon_color' => $labelColor, // Color del icono del juego
                    'label' => $totalServersCount,
                    'label_color' => $labelColor,
                    'submenu' => $submenu,
                ]);
            }

            // Add "Añadir juego" item
            $event->menu->add([
                'text' => 'Añadir juego',
                'url' => route('games.create'),
                'icon' => 'fas fa-fw fa-plus',
            ]);

            // Add the company link at the bottom of the sidebar
            $event->menu->add([
                'text' => config('app.APP_NAME', 'Netshiba'),
                'url' => config('app.APP_URL', 'https://netshiba.com'),
                'icon' => 'fas fa-fw fa-link',
                'classes_body' => 'sidebar-footer',
            ]);
        });

        return $next($request);
    }
}