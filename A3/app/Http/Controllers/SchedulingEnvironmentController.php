<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\LearningEnvironment;
use App\Models\SchedulingEnvironment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchedulingEnvironmentController extends Controller
{

    private $rules = [
        'course_id' => 'numeric',
        'instructor_id' => 'numeric',
        'date_scheduling' => 'required|date|date_format:Y-m-d',
        'initial_hour' => 'required|string|max:9999999999|min:1',
        'final_hour' => 'required|string|max:9999999999|min:1',
        'environment_id' => 'numeric',
       
    ];

    private $traductionAttributes = array(
        'course_id' => 'curso',
        'instructor_id' => 'instructor',
        'date_scheduling' =>  'fecha de reserva',
        'initial_hour' => 'hora inicial',
        'final_hour' => 'hora final',
        'environment_id' => 'ambiente'
           
  );


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scheduling_environments = SchedulingEnvironment::all();
        return view('scheduling_environment.index', compact('scheduling_environments'));
    }



    public function reports()
    {
      $courses = Course::all();
      $instructors = Instructor::all();
      return view('scheduling_environment.reports', compact( 'courses' , 'instructors'));
    } 

    public function export_scheduling_environments_by_course(Request $request)
    {
        $courses = Course::where('id', '=', $request['course_id'])->first();
        $learning_environments = LearningEnvironment::all();
        $scheduling_environments = SchedulingEnvironment::whereBetween('date_scheduling',[ $request['initial_date'], $request['final_date']])
                ->where('course_id' , '=' , $request['course_id'])->get();
        $data = array(
            'initial_date' => $request['initial_date'],
            'final_date' => $request['final_date'],
            'courses' => $courses,
            'learning_environments' => $learning_environments,
            'scheduling_environments' => $scheduling_environments
            
        );

        $pdf = Pdf::loadView('reports.export_scheduling_environments_by_course', $data)
                 ->setPaper('letter','portrait');
        return $pdf->download('scheduling_environment_by_course.pdf');
    }
    
    public function export_scheduling_environments_by_instructor(Request $request)
    {
        $instructors = Instructor::where('id', '=', $request['fullname'])->first();
        $learning_environments = LearningEnvironment::all();
        $scheduling_environments = SchedulingEnvironment::whereBetween('date_scheduling',[ $request['initial_date'], $request['final_date']])->
                    where('instructor_id' , '=' , $request['instructor_id'])->get();
         $data = array(
            'initial_date' => $request['initial_date'],
            'final_date' => $request['final_date'],
            'instructors' => $instructors,
            'learning_environments' => $learning_environments,
            'scheduling_environments' => $scheduling_environments
            
        );

        $pdf = Pdf::loadView('reports.export_sheduling_environments_by_instructor', $data)
                 ->setPaper('letter','portrait');
        return $pdf->download('scheduling_environment_by_instructor.pdf');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $instructors = Instructor::all();
        $learning_environments = LearningEnvironment::all();
        return view('scheduling_environment.create', compact('courses', 'instructors', 'learning_environments' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('scheduling_environment.create')->withInput()->withErrors($errors);
        }

        $scheduling_environment = SchedulingEnvironment::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('scheduling_environment.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $scheduling_environment = SchedulingEnvironment::find($id);
        if($scheduling_environment)
        {
            $courses = Course::all();
            $instructors = Instructor::all();
            $learning_environments = LearningEnvironment::all();
           
          
            return view('scheduling_environment.edit', compact('scheduling_environment','courses', 'instructors', 'learning_environments'));

          
        }
        session()->flash('message', 'No se encuentra el registro solicitado');
        return redirect()->route('scheduling_environment.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('scheduling_environment.edit',$id)->withInput()->withErrors($errors);
        }
       
        
        $scheduling_environment = SchedulingEnvironment::find($id);
        if($scheduling_environment)
        {
            $scheduling_environment->update($request->all());
            session()->flash('message', 'Registro actualizado exitosamente');

        }
        else
        {
            return redirect()->route('scheduling_environment.index');
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('scheduling_environment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $scheduling_environment = SchedulingEnvironment::find($id);
        if($scheduling_environment)
        {
            $scheduling_environment->delete();
            session()->flash('message', 'Registro eliminado exitosamente');

        }
        else
        {
            return redirect()->route('scheduling_environment.index');
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('scheduling_environment.index');
    }
}
