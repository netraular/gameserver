@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Nuevo Juego</div>

                <div class="card-body">
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
</div>
@endsection