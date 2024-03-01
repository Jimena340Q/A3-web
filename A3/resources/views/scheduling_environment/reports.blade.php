@extends('templates.base')
@section('title', 'Reportes')
@section('header','Reportes')
@section('content')
    @include('templates.messages')
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Reporte Reservas de Ambiente por Ficha</h6>
                        </div>
                        <div class="card-body">
                        <form action="{{route ('scheduling_environment.report_by_course' )}}" method="POST">
                            @csrf
                            <div class="row form-group">
                                    <div>
                                        <label for="initial_date">Fecha inicial</label>
                                    </div>
                                    <div class="col-lg-2">
                                    <input type="date" class="form-control"
                                        id="initial_date" name="initial_date" required>  
                                    </div>
                                    <div>
                                        <label for="final_date">Fecha final</label>
                                    </div>
                                    <div class="col-lg-2">
                                        
                                        <input type="date" class="form-control"
                                        id="final__date" name="final_date" required>  
                                    </div>

                                    <div>
                                        <label for="code">Ficha</label>
                                    </div>
                                    <div  class="col-lg-2">
                                        <select name="course_id" id="course_id" class="form-control" required>
                                            <option value="">Seleccione</option>
                                            @foreach ($courses as $course)
                                            <option value="{{ $course['id'] }}">
                                                {{ $course['code'] }}
                                            </option>
       
                                            @endforeach
                                        </select> 
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="submit" class="btn btn-success btn-block col-lg-3 mb-4">
                                            <i class="fa-solid fa-file-pdf"></i>
                                        </button>
                                    </div>
                            </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Reporte Reservas de Ambiente por Instructor</h6>
                        </div>
                        <div class="card-body">
                        <form action="{{route ('scheduling_environments.report_by_instructor' )}}" method="POST">
                            @csrf
                            <div class="row form-group">
                                    <div>
                                        <label for="initial_date">Fecha inicial</label>
                                    </div>
                                    <div class="col-lg-2">
                                    <input type="date" class="form-control"
                                        id="initial_date" name="initial_date" required>  
                                    </div>
                                    <div>
                                        <label for="final_date">Fecha final</label>
                                    </div>
                                    <div class="col-lg-2">
                                        
                                        <input type="date" class="form-control"
                                        id="final__date" name="final_date" required>  
                                    </div>

                                    <div>
                                        <label for="instructor_id">Instructor</label>
                                    </div>
                                    <div  class="col-lg-2">
                                        <select name="instructor_id" id="instructor_id" class="form-control" required>
                                            <option value="">Seleccione</option>
                                            @foreach ($instructors as $instructor)
                                            <option value="{{ $instructor['id'] }}">
                                                {{ $instructor['fullname'] }}
                                            </option>
                                            @endforeach
                                        </select> 
                                    </div>


                                    <div class="col-lg-2">
                                        <button type="submit" class="btn btn-success btn-block col-lg-3 mb-4">
                                            <i class="fa-solid fa-file-pdf"></i>
                                        </button>
                                    </div>
                            </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
