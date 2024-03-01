@extends('templates.base_reports')
@section('header', 'Reporte reservas de ambientes por ficha')
@section('content')
    <section id="results">
     @if ($scheduling_environments)

        <p> <strong>Fecha inicial:</strong> {{ $initial_date }}</p>
        <p> <strong>Fecha final:</strong> {{ $final_date }}</p>     
        
        <h3>Reservas</h3>
        <table id="ReportTable">
            <thead>
                <tr>
                     <th>Id</th>
                     <th>Curso</th>
                     <th>Instructor</th>
                     <th>Fecha</th>
                     <th>Hora inicial</th>
                     <th>Hora final</th>
                     <th>Ambiente</th>
                 </tr>
            </thead>
            <tbody>
                @foreach ($scheduling_environments as $scheduling_environment)
                    <tr>
                        <td>{{ $scheduling_environment['id'] }}</td>
                        <td>{{ $scheduling_environment->course->code}}</td>
                        <td>{{ $scheduling_environment->instructor->fullname }}</td>
                        <td>{{ $scheduling_environment['date_scheduling']}}</td>
                        <td>{{ $scheduling_environment['initial_hour']}}</td>
                        <td>{{ $scheduling_environment['final_hour']}}</td>
                        <td>{{ $scheduling_environment->learning_environment->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h5>No existen Reservas</h5>
    @endif
    </section>
@endsection

