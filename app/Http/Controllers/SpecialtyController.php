<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;

class SpecialtyController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create(){
        return view('specialties.create');
    }

    public function sendData(Request $request){
        
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El campo nombre es obligatorio',
            'name.min'      => 'El campo nombre debe contener m�nimo 3 car�cteres'
        ];

        $this->validate($request, $rules, $messages);

        $specialty = new Specialty();
        
        $specialty->name        =   $request->input('name');
        $specialty->description =   $request->input('description');

        $specialty->save();

        $notification = 'Registro creado correctamente.';

        return redirect('/especialidades')->with(compact('notification'));

    }

    public function edit(Specialty $specialty){
        return view('specialties.edit', compact('specialty'));
    }


    public function update(Request $request, Specialty $specialty){
        
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El campo nombre es obligatorio',
            'name.min'      => 'El campo nombre debe contener m�nimo 3 car�cteres'
        ];

        $this->validate($request, $rules, $messages);
        
        $specialty->name        =   $request->input('name');
        $specialty->description =   $request->input('description');

        $specialty->save();

        $notification = 'Registro editado correctamente.';

        return redirect('/especialidades')->with(compact('notification'));

    }

    public function destroy(Specialty $specialty){

        $deleteName = $specialty->name;
        $specialty->delete();

        $notification = 'Registro '.$deleteName.' eliminado correctamente.';

        return redirect('/especialidades')->with(compact('notification'));

    }

}
