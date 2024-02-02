@extends('templates.base')
@section('title', 'Editar ubicacion')
@section('header','Editar ubicacion')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="#" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control"
                            id="name" name="name" required>
                    </div>
            
                    <div class="col-lg-4 mb-4">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control"
                        id="address" name="address" required>
                    </div>
                                
                    <div class="col-lg-4 mb-4">
                        <label for="status">Estado</label>
                        <select name="status" id="status"
                         class="form-control" required>
                        <option value="">Seleccione</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
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