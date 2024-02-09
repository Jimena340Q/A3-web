@extends('templates.base')
@section('title', 'Editar carrera')
@section('header', 'Editar carrera')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="#" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-12 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control"
                        id="name" name="name" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 mb-4">
                        <label for="type">Tipo</label>
                        <select type="text" class="form-control"
                        id="type" name="type" required>
                        <option value="">Seleccione</option>
                        <option value="tecnico">Tecnico</option>
                        <option value="tecnologo">Tecnologo</option>
                        <option value="curso">Curso corto</option>
                        </select>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <button class="btn btn-primary btn-block"
                            type="submit">
                            Guardar
                        </button>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <a href="{{ route('career.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection