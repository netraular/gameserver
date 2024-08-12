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
@endsection