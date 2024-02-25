<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class InstructorController extends Controller
{
    private $rules = [
        'document' => 'required|numeric|max:99999999999999999999|min:3',
        'fullname' => 'required|string|max:100|min:3',
        'sena_email' => 'required|email|max:100',
        'personal_email' => 'required|email|max:100',
        'phone' => 'numeric|max:999999999999999999999999999999|min:3',
        'password' => 'required|string|min:8|max:100',
        'type' => 'required|string|max:20',
        'profile'=> 'required|string|max:120|min:3'
    ];

    private $traductionAttributes = array(
        'document' => 'documento',
        'fullname' => 'nombre',
        'sena_email' => 'correo sena',
        'personal_email' => 'correo personal',
        'phone' => 'telefono',
        'password' => 'contraseña',
        'type' => 'tipo',
        'profile' => 'perfil'    
  );
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
        $types = array(
            ['name' => 'CONTRATISTA' , 'value' => 'CONTRATISTA'],
            ['name' => 'PLANTA' , 'value' => 'PLANTA'],
        );

        return view('instructor.create', compact( 'types'));
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
            return redirect()->route('instructor.create')->withInput()->withErrors($errors);
        }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
        session()->flash('warning','No se encontro el registro solicitado');
        return redirect()->route('instructor.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if ($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('instructor.edit' , $id)->withInput()->withErrors($errors);
        
        }
        
        $request['password'] = Hash::make($request['password']);
        $instructor = Instructor::find($id);
        
        if($instructor)
        {
            $instructor->update($request->all());
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

            session()->flash('warning' , 'No se encuentra el registro solicitado');

        }
        return redirect()->route('instructor.index');
    }
}
