@extends('templates.base')
@section('title', 'Editar Reservas de Ambiente')
@section('header', 'Editar Reservas de Ambiente')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="#" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                            <label for="course_id">Curso</label>
                            <select name="course_id" id="course_id"
                            class="form-control" required>
                            <option value="">Seleccione</option>
                            
                            </select>
                    </div>
            
                    <div class="col-lg-4 mb-4">
                        <label for="instructor_id">Instructor</label>
                        <select name="instructor_id" id="instructor_id"
                        class="form-control" required>
                        <option value="">Seleccione</option>
                        
                        </select>
                    </div>
                                
                    <div class="col-lg-4 mb-4">
                        <label for="date_scheduling">Fecha de programacion</label>
                        <input type="date" class="form-control"
                        id="date_scheduling" name="date_scheduling" required>
                        
                        
                        </select>
                    </div>
                </div>    

                
                <div class="row form-group">

                    <div class="col-lg-4 mb-4">
                        <label for="initial_hour">Hora inicial</label>
                        <input type="time" class="form-control"
                        id="initial_date" name="initial_date" required>
                    </div>
                    
                    <div class="col-lg-4 mb-4">
                        <label for="final_hour">Hora final</label>
                        <input type="time" class="form-control"
                        id="final_hour" name="final_hour" required>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <label for="environment_id">Ambiente</label>
                        <select name="environment_id" id="environment_id"
                        class="form-control" required>
                        <option value="">Seleccione</option>
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