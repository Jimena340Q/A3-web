<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::all();
        return view('instructor.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructor = Instructor::all();
        if($instructor)
        {
            $types = array(
                ['name' => 'CONTRATISTA' , 'value' => 'CONTRATISTA'],
                ['name' => 'PLANTA' , 'value' => 'PLANTA'],
            );

            return view('instructor.create', compact('instructor', 'types'));


        }
        return redirect()->route('instructor.index');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['password'] = Hash::make($request['password']);
        $instructor = Instructor::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('instructor.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $instructor = Instructor::find($id);
        if($instructor)
        {
            return view('instructor.edit', compact('instructor'));
        }
        else
        {
            return redirect()->route('instructor.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $instructor = Instructor::find($id);
        if($instructor)
        {
            $types = array(
                ['name' => 'CONTRATISTA' , 'value' => 'CONTRATISTA'],
                ['name' => 'PLANTA' , 'value' => 'PLANTA'],
            );

            return view('instructor.edit', compact('instructor', 'types'));



        }
        return redirect()->route('instructor.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request['password'] = Hash::make($request['password']);
        $instructor = Instructor::find($id);
        if($instructor)
        {
            $instructor->update($request->all()); //Delete from causal where id = x
            session()->flash('message', 'Registro actualizado exitosamente');
        }
        else
        {
            
            session()->flash('warning', 'No se encuentra el registro solicitado');

        }

        return redirect()->route('instructor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instructor = Instructor::find($id);
        if($instructor)
        {
            $instructor->delete(); //Delete from causal where id = x
            session()->flash('message', 'Registro eliminado exitosamente');
        }
        else
        {
            return redirect()->route('instructor.index');
            session()->flash('warning', 'No se encuentra el registro solicitado');

        }

        return redirect()->route('instructor.index');
    }
}
