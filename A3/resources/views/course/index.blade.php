@extends('templates.base')
@section('title', 'Listado carreras')
@section('header', 'Listado carreras')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip grap-2 d-md-block">
            <a href="{{ route('course.create') }}" class="btn btn-primary">Crear</a>
        </div>
    </div>
    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_data" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Ficha</th>
                        <th>Jornada</th>
                        <th>Carrera</th>
                        <th>Fecha inicial</th>
                        <th>Fecha final</th>
                        <th>Estado</th>
                        <th>Acciones</th>


                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2356864</td>
                        <td>Nocturna</td>
                        <td>Enfermeria</td>
                        <td>2024-02-01</td>
                        <td>2026-11-09</td>
                        <td>Inducción</td>
                        
                        <td>
                            <a href="#" title="editar" class="btn btn-info btn-circle btn-sm">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="#" title="eliminar" class="btn btn-danger btn-circle btn-sm" onclick="return remove();">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
@section('scripts')
       <script src="{{ asset('js/general.js') }}"></script>
        
    
    
@endsection