<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
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