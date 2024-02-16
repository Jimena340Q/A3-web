@extends('templates.base')
@section('title', 'Editar Tipo de ambiente')
@section('header', 'Editar Tipo de ambiente')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('environment_type.update', $environment_type['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-lg-12 mb-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control"
                        id="description" name="description" required
                        value="{{ $environment_type['description'] }}">
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
                        <a href="{{ route('environment_type.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection