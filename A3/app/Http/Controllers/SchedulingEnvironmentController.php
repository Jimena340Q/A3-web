<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\LearningEnvironment;
use App\Models\SchedulingEnvironment;
use Illuminate\Http\Request;

class SchedulingEnvironmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scheduling_environments = SchedulingEnvironment::all();
        return view('scheduling_environment.index', compact('scheduling_environments'));
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
        $scheduling_environment = SchedulingEnvironment::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('learning_environment.index');
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
