@extends('templates.base')
@section('title', 'Listado Entornos')
@section('header','Listado Entornos')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip grap-2 d-md-block">
            <a href="{{ route('learning_environment.create') }}" class="btn btn-primary">Crear</a>
        </div>
    </div>
    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_data" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Capacidad</th>
                        <th>Area mt2</th>
                        <th>Piso</th>
                        <th>Inventario</th>
                        <th>Tipo</th>
                        <th>Ubicacion</th>
                        <th>Estado</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($learning_environments as $learning_environment)
                         
                            <tr>
                                <td>{{ $learning_environment['id'] }}</td>
                                <td>{{ $learning_environment['name'] }}</td>
                                <td>{{ $learning_environment['capacity'] }}</td>
                                <td>{{ $learning_environment['area_mt2'] }}</td>
                                <td>{{ $learning_environment['floor'] }} </td>
                                <td>{{ $learning_environment['inventory'] }} </td>
                                <td>{{ $learning_environment->environment_type->description }}</td>
                                <td>{{ $learning_environment->location->name}}</td>
                                <td>{{ $learning_environment['status']}}</td>
                                
                                
                                <td>
                                    <a href="{{ route('learning_environment.edit', $learning_environment  ['id']) }}" title="editar" class="btn btn-info btn-circle btn-sm">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="{{ route('learning_environment.destroy', $learning_environment ['id']) }}" title="eliminar" class="btn btn-danger btn-circle btn-sm" onclick="return remove();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
@section('scripts')
       <script src="{{ asset('js/general.js') }}"></script>
        
    
    
@endsection