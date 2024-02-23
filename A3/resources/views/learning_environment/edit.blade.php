@extends('templates.base')
@section('title', 'Editar Entorno')
@section('header','Editar Entorno')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('learning_environment.update', $learning_environment['id']) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="row form-group">
                        <div class="col-lg-4 mb-4">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control"
                                id="name" name="name" required
                                value="{{ $learning_environment['name'] }}">
                        </div>


                        <div class="col-lg-4 mb-4">
                            <label for="capacity">Capacidad</label>
                            <input type="number" class="form-control"
                            id="capacity" name="capacity" required
                            value="{{ $learning_environment['capacity'] }}">
                        </div>

                        <div class="col-lg-4 mb-4">
                            <label for="area_mt2">Area mt2</label>
                            <input type="number" class="form-control"
                            id="area_mt2" name="area_mt2"
                            value="{{ $learning_environment['area_mt2'] }}">
                        </div>
                    </div>    

                
                <div class="row form-group">

                    <div class="col-lg-4 mb-4">
                        <label for="floor">Piso</label>
                        <input type="number" class="form-control"
                        id="floor" name="floor" required
                        value="{{ $learning_environment['floor'] }}">
                    </div>
                    
                    <div class="col-lg-4 mb-4">
                            <label for="inventory">Inventario</label>
                            <input type="text" class="form-control"
                            id="inventory" name="inventory" required
                            value="{{ $learning_environment['inventory'] }}">
                    </div>

                    <div class="col-lg-4 mb-4">
                        <label for="type_id">Tipo</label>
                        <select name="type_id" id="type_id"
                            class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach ($environment_types as $environment_type)
                                <option value="{{$environment_type['id']}}" 
                                    @if ($environment_type['id'] == $learning_environment['type_id'])
                                        selected @endif> 
                                    {{ $environment_type['description'] }}

                                </option>
                            @endforeach
                       </select>    
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-lg-6 mb-4">
                        <label for="location_id">Ubicacion</label>
                        <select name="location_id" id="location_id"
                             class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach ($locations as $location)
                                <option value="{{$location['id']}}" 
                                    @if ($location['id'] == $learning_environment['location_id'])
                                    selected @endif> 
                                    {{ $location['name'] }}                               
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6 mb-4">
                            <label for="status">Estado</label>
                            <select name="status" id="status"
                            class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach ($status as $s)
                                <option value="{{$s['value']}}" 
                                    @if ($s['value'] == $learning_environment['s'])
                                        selected @endif> 
                                    {{ $s['name'] }}                               
                                </option>
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
                        <a href="{{ route('learning_environment.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
