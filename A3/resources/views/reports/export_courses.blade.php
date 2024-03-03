@extends('templates.base_reports')
@section('header', 'Reporte General de Cursos')
@section('content')
    <section id="results">
     @if ($courses)
  
        
     <h3>Cursos</h3>
        <table id="ReportTable">
            <thead>
                <tr>
                     <th>Id</th>
                     <th>Código</th>
                     <th>Jornada</th>
                     <th>Carrera</th>
                     <th>Fecha inicial</th>
                     <th>Fecha final</th>
                     <th>Estado</th>
                 </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course['id'] }}</td>
                        <td>{{ $course['code']}}</td>
                        <td>{{ $course['shift'] }}</td>
                        <td>{{ $course->career->name}}</td>
                        <td>{{ $course['initial_date']}}</td>
                        <td>{{ $course['final_date']}}</td>
                        <td>{{ $course['status']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h5>No existen cursos</h5>
    @endif
    </section>
@endsection

