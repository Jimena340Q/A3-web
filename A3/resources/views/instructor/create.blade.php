@extends('templates.base')
@section('title', 'Crear Instructor')
@section('header','Crear Instructor')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('instructor.store') }}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                            <label for="document">Documento</label>
                            <input type="number" class="form-control"
                            id="document" name="document" required
                            value="{{ old('document') }}">
                    </div>
            
                    <div class="col-lg-4 mb-4">
                        <label for="fullname">Nombre</label>
                        <input type="text" class="form-control"
                        id="fullname" name="fullname" required
                        value="{{ old('fullname') }}">
                    </div>
                                
                    <div class="col-lg-4 mb-4">
                        <label for="sena_email">Correo Sena</label>
                        <input type="email" class="form-control"
                        id="sena_email" name="sena_email" required
                        value="{{ old('sena_email') }}">
                        
                    </div>
                </div>    

                
                <div class="row form-group">

                    <div class="col-lg-4 mb-4">
                        <label for="personal_email">Correo Personal</label>
                        <input type="email" class="form-control"
                        id="personal_email" name="personal_email" required
                        value="{{ old('personal_email') }}">
                    </div>
                    
                    <div class="col-lg-4 mb-4">
                            <label for="phone">Telefono</label>
                            <input type="number" class="form-control"
                            id="phone" name="phone" required
                            value="{{ old('phone') }}">
                    </div>


                    <div class="col-lg-4 mb-4">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control"
                        id="password" name="password" required
                        value="{{ old('password') }}">
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-lg-6 mb-4">
                        <label for="type">Tipo</label>
                        <select name="type" id="type"
                         class="form-control" required>
                        <option value="">Seleccione</option>
                    @foreach ($types as $type)
                        <option value="{{ $type['value'] }}"
                        @if(old('type') == $type['name']) selected @endif>
                            {{ $type['name'] }}</option>
                    @endforeach

                        
                        </select>
                    </div>
                    
                    <div class="col-lg-6 mb-4">
                            <label for="profile">Perfil</label>
                            <input type="text" class="form-control"
                            id="profile" name="profile" required
                            value="{{ old('profile') }}">
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
                        <a href="{{ route('instructor.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection