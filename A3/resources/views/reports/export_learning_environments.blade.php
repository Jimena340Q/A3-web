@extends('templates.base_reports')
@section('header', 'Reporte reservas de ambientes')
@section('content')
    <section id="results">
     @if ($learning_environments)
         
        <h3>Reservas</h3>
        <table id="ReportTable">
            <thead>
                <tr>
                     <th>Id</th>
                     <th>Nombre</th>
                     <th>Capacidad</th>
                     <th>Area_mt2</th>
                     <th>Piso</th>
                     <th>Inventario</th>
                     <th>Tipo</th>
                     <th>Lugar</th>
                     <th>Estado</th>
                 </tr>
            </thead>
            <tbody>
                @foreach ($learning_environments as $learning_environment)
                    <tr>
                        <td>{{ $learning_environment['id'] }}</td>
                        <td>{{ $learning_environment['name']}}</td>
                        <td>{{ $learning_environment['capacity']}}</td>
                        <td>{{ $learning_environment['area_mt2']}}</td>
                        <td>{{ $learning_environment['floor']}}</td>
                        <td>{{ $learning_environment['inventory']}}</td>
                        <td>{{ $learning_environment->environment_type->description}}</td>
                        <td>{{ $learning_environment->location->name}}</td>
                        <td>{{ $learning_environment['status']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h5>No existen ambientes</h5>
    @endif
    </section>
@endsection

