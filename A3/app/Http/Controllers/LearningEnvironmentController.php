<?php

namespace App\Http\Controllers;

use App\Models\EnvironmentType;
use App\Models\LearningEnvironment;
use App\Models\Location;
use App\Models\SchedulingEnvironment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LearningEnvironmentController extends Controller
{
    
    private $rules =[
       
            'name' =>'required|string|max:50|min:3',
            'capacity' => 'numeric|max:9999999999',
            'area_mt2' => 'numeric|max:9999999999|min:2',
            'floor' => 'required|string|max:1',
            'inventory' => 'string|max:150',
            'type_id' => 'numeric',
            'location_id' => 'numeric',
            'status' => 'string|max:20|min:5'


        ];
        private $traductionAttributes = [

            'name' => 'nombre',
            'capacity' => 'capacidad',
            'area_mt2' => 'area_mt2',
            'floor' => 'piso',
            'inventory' => 'inventario',
            'type_id' => 'tipo',
            'location_id' => 'ubicación',
            'status' => 'estado'

        ];





    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $learning_environments = LearningEnvironment::all();
        return view('learning_environment.index', compact('learning_environments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {       
        $environment_types = EnvironmentType::all();
        $locations = Location::all();
        $status = array(
            ['name' => 'ACTIVO' , 'value' => 'ACTIVO'],
            ['name' => 'INACTIVO' , 'value' => 'INACTIVO'],
        );

        return view('learning_environment.create', compact('environment_types','locations', 'status', ));

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
            return redirect()->route('learning_environment.create')->withInput()->withErrors($errors);
        }

        $learning_environment = LearningEnvironment::create($request->all());
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
        $learning_environment = LearningEnvironment::find($id);
        if($learning_environment)
        {
            $environment_types = EnvironmentType::all();
            $locations = Location::all();
            $status = array(
                ['name' => 'ACTIVO' , 'value' => 'ACTIVO'],
                ['name' => 'INACTIVO' , 'value' => 'INACTIVO'],
            );
            return view('learning_environment.edit', compact('learning_environment','environment_types', 'locations', 'status'));
          
        }
        session()->flash('message', 'No se encuentra el registro solicitado');
        return redirect()->route('learning_environment.index');       
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
            return redirect()->route('learning_environment.edit', $id)->withInput()->withErrors($errors);
        }

        $learning_environment = LearningEnvironment::find($id);
        if($learning_environment)
        {
            $learning_environment->update($request->all());
            session()->flash('message', 'Registro actualizado exitosamente');

        }
        else
        {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        
        return redirect()->route('learning_environment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $learning_environment = LearningEnvironment::find($id);
        if($learning_environment)
        {
            $learning_environment->delete();
            session()->flash('message', 'Registro eliminado exitosamente');

        }
        else
        {
            return redirect()->route('learning_environment.index');
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('learning_environment.index');
    }
}
