<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Course;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    private $rules =[
        'code' =>'required|numeric|max:9999999999|min:3',
        'shift' => 'required|string|max:70|min:3',
        'career_id' => 'numeric',
        'initial_date' => 'required|date|date_format:Y-m-d',
        'final_date' => 'required|date|date_format:Y-m-d',
        'status' => 'required|string|max:20|min:3'

    ];
    
    private $traductionAttributes = [
        'code' => 'ficha',
        'shift' => 'jornada',
        'career_id' => 'carrera',
        'initial_date' => 'fecha inicial',
        'final_date' => 'fecha final',
        'status' => 'estado',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    public function reports()
    {
      $careers = Career::all();
      return view('course.index', compact('careers' ));
    } 

  

    public function export_courses()
    {
        $courses = Course::all();
        $data = array(
            'courses' => $courses
        );
        $pfp = Pdf::loadView('reports.export_courses', $data)
                    ->setPaper('letter','portrait');
        return $pfp->download('courses.pdf');
    }  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        $careers = Career::all();
        $shifts = array(
            ['name' => 'DIURNA' , 'value' => 'DIURNA'],
            ['name' => 'MIXTA' , 'value' => 'MIXTA'],
            ['name' => 'NOCTURNA' , 'value' => 'NOCTURNA'],
        );
        $status = array(
            ['name' => 'INDUCCIÓN' , 'value' => 'INDUCCIÓN'],
            ['name' => 'LECTIVA' , 'value' => 'LECTIVA'],
            ['name' => 'PRODUCTIVA' , 'value' => 'PRODUCTIVA'],
        );
        return view('course.create' , compact('careers' , 'shifts' , 'status'));
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
            return redirect()->route('course.create')->withInput()->withErrors($errors);
        }
        $course = Course::create($request->all());
        session()->flash('message','Registro creado exitosamente');
        return redirect()->route('course.index');
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
        $course = Course::find($id);
        if($course)
        {
            $shifts = array(
                ['name' => 'DIURNA' , 'value' => 'DIURNA'],
                ['name' => 'MIXTA' , 'value' => 'MIXTA'],
                ['name' => 'NOCTURNA' , 'value' => 'NOCTURNA'],
            );
            $status = array(
                ['name' => 'INDUCCIÓN' , 'value' => 'INDUCCIÓN'],
                ['name' => 'LECTIVA' , 'value' => 'LECTIVA'],
                ['name' => 'PRODUCTIVA' , 'value' => 'PRODUCTIVA'],
            );
            $careers = Career::all();
            return view('course.edit', compact('course', 'careers' , 'shifts' , 'status'));
        }

            session()->flash('warning','No se encontro el registro solicitado');
            return redirect()->route('course.index');
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
            return redirect()->route('course.edit' , $id)->withInput()->withErrors($errors);
        }
        $course = Course::find($id);
        if($course)
        {
            $course->update($request->all()); 
            session()->flash('message','Registro actualizado exitosamente');
        }
        else
        {
            session()->flash('warning','No se encuentra el registro solicitado');
        }
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        if($course)
        {
            $course->delete(); 
            session()->flash('message','Registro eliminado exitosamente');
        }
        else
        {
            session()->flash('warning','No se encuentra el registro solicitado');
        }
        return redirect()->route('course.index');
    }
}