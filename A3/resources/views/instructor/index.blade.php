@extends('templates.base')
@section('title', 'Listado instructores')
@section('header','Listado instructores')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip grap-2 d-md-block">
            <a href="{{ route('instructor.create') }}" class="btn btn-primary">Crear</a>
        </div>
    </div>
    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_data" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Correo Sena</th>
                        <th>Correo Personal</th>
                        <th>Telefono</th>
                        <th>Contraseñea</th>
                        <th>Tipo</th>
                        <th>Perfil</th>
                        <th>Acciones</th>


                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>7</td>
                        <td>1116080874</td>
                        <td>Andres Escobar</td>
                        <td>anfeles@sena.edu.co</td>
                        <td>anfeles@gmail.como</td>
                        <td>320 4875420</td>
                        <td>password</td>
                        <td>Planta</td>
                        <td>Programador</td>
                        
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