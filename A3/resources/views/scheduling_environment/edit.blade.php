@extends('templates.base')
@section('title', 'Editar Reservas de Ambiente')
@section('header', 'Editar Reservas de Ambiente')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('scheduling_environment.update', $scheduling_environment['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                        <label for="course_id">Curso</label>
                        <select name="course_id" id="course_id"
                            class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach ($courses as $course)
                                <option value="{{$course['id']}}" 
                                    @if ($course['id'] == $scheduling_environment['course_id'])
                                    selected @endif> 
                                    {{ $course['code'] }}                                    
                                </option>
                            @endforeach                            
                        </select>
                    </div>
            
                    <div class="col-lg-4 mb-4">
                        <label for="instructor_id">Instructor</label>
                        <select name="instructor_id" id="instructor_id"
                        class="form-control" required>
                        <option value="">Seleccione</option>
                            @foreach ($instructors as $instructor)
                                <option value="{{$instructor['id']}}" 
                                    @if ($instructor['id'] == $scheduling_environment['instructor_id'])
                                    selected @endif> 
                                    {{ $instructor['fullname'] }}
                                </option>
                            @endforeach                       
                        </select>
                    </div>
                                
                    <div class="col-lg-4 mb-4">
                        <label for="date_scheduling">Fecha de programacion</label>
                        <input type="date" class="form-control"
                        id="date_scheduling" name="date_scheduling" required
                        value="{{ $scheduling_environment['date_scheduling'] }}">
                    </div>
                </div>     
                <div class="row form-group">

                    <div class="col-lg-4 mb-4">
                        <label for="initial_hour">Hora inicial</label>
                        <input type="time" class="form-control"
                        id="initial_hour" name="initial_hour" required
                        value="{{ $scheduling_environment['initial_hour'] }}">
                    </div>
                    
                    <div class="col-lg-4 mb-4">
                        <label for="final_hour">Hora final</label>
                        <input type="time" class="form-control"
                        id="final_hour" name="final_hour" required
                        value="{{ $scheduling_environment['final_hour'] }}">
                    </div>

                    <div class="col-lg-4 mb-4">
                        <label for="environment_id">Ambiente</label>
                        <select name="environment_id" id="environment_id"
                            class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach ($learning_environments as $learning_environment)
                                <option value="{{$learning_environment['id']}}" 
                                    @if ($learning_environment['id'] == $scheduling_environment['environment_id'])
                                    selected @endif> 
                                    {{ $learning_environment['name'] }}

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
                        <a href="{{ route('scheduling_environment.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection