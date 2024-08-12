@extends('layouts.app')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggle-button').forEach(button => {
            button.addEventListener('click', function () {
                const currentState = button.getAttribute('data-state');
                if (currentState === 'off') {
                    button.textContent = 'Apagar';
                    button.setAttribute('data-state', 'on');
                    button.classList.remove('btn-danger');
                    button.classList.add('btn-success');
                } else {
                    button.textContent = 'Encender';
                    button.setAttribute('data-state', 'off');
                    button.classList.remove('btn-success');
                    button.classList.add('btn-danger');
                }
            });
        });
    });
</script>

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-12 text-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createServerModal">
                Crear Nuevo Servidor
            </button>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createGameModal">
                Crear Nuevo Juego
            </button>
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach($servers as $server)
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header" style="background-color: {{ $server->game->hex_color }}; color: white;">
                    {{ $server->game->name }}
                </div>
                <div class="card-body" style="background-image: url('{{ asset($server->game->background) }}'); background-size: cover;">
                    <img src="{{ asset($server->game->logo) }}" alt="{{ $server->game->name }} Logo" class="img-fluid mb-3">
                    <p>{{ $server->game->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-{{ $server->status == 'on' ? 'success' : 'danger' }} toggle-button" data-state="{{ $server->status }}">
                                {{ $server->status == 'on' ? 'Apagar' : 'Encender' }}
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                    Otras acciones
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach($server->commands as $command)
                                    <li><a class="dropdown-item" href="#">{{ $command->command }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal para crear nuevo servidor -->
<div class="modal fade" id="createServerModal" tabindex="-1" aria-labelledby="createServerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createServerModalLabel">Crear Nuevo Servidor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('servers.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="game_id" class="form-label">Juego</label>
                        <select class="form-select" id="game_id" name="game_id" required>
                            @foreach($games as $game)
                                <option value="{{ $game->id }}">{{ $game->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del Servidor</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para crear nuevo juego -->
<div class="modal fade" id="createGameModal" tabindex="-1" aria-labelledby="createGameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createGameModalLabel">Crear Nuevo Juego</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del Juego</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo del Juego</label>
                        <input type="file" class="form-control" id="logo" name="logo" required>
                    </div>
                    <div class="mb-3">
                        <label for="background" class="form-label">Background del Juego</label>
                        <input type="file" class="form-control" id="background" name="background" required>
                    </div>
                    <div class="mb-3">
                        <label for="hex_color" class="form-label">Color en Hexadecimal</label>
                        <input type="text" class="form-control" id="hex_color" name="hex_color" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection