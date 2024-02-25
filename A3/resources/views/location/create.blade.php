@extends('templates.base')
@section('title', 'Crear ubicacion')
@section('header','Crear ubicacion')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('location.store') }}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control"
                            id="name" name="name" required
                            value="{{ old('name') }}">
                    </div>
            
                    <div class="col-lg-4 mb-4">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control"
                        id="address" name="address" required
                        value="{{ old('address') }}">
                    </div>
                                
                    <div class="col-lg-4 mb-4">
                        <label for="status">Estado</label>
                        <select name="status" id="status"
                         class="form-control" required>
                        <option value="">Seleccione</option>
                    @foreach ($status as $status)
                        <option value="{{ $status['value'] }}"
                        @if (old('status') == $status['name']) selected @endif>
                            {{ $status['name'] }}</option>
                    @endforeach

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
                        <a href="{{ route('location.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection