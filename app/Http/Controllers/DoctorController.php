<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DoctorController extends Controller
{

    public function index()
    {
        //$doctors = User::all();
        //$doctors = User::doctors()->get();
        $doctors = User::doctors()->paginate(10);
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'      =>  'required|min:3',
            'email'     =>  'required|email',
            'cedula'    =>  'required|min:6|max:10',
            'address'   =>  'nullable|min:6',
            'phone'      => 'required|min:10',

        ];

        $messages   =   [
            'name.required'     =>  'El campo nombre es obligatorio',
            'name.min'          =>  'El campo nombre debe tener más de 3 carácteres',
            'email.required'    =>  'El campo email es obligatorio',
            'email.email'       =>  'Ingresa un email valido',
            'cedula.required'   =>  'El campo documento es obligatorio',
            'cedula.min'        =>  'El documento debe tener mínimo 6 carácteres',
            'cedula.max'        =>  'El documento debe tener máximo 10 carácteres',
            'address.min'       =>  'El campo dirección debe contener mínimo 6 carácteres',
            'phone.required'     =>  'El campo teléfono es obligatorio',
        ];

        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name','email','cedula','address','phone')
            + [
                'role'      =>  'doctor',
                'password'  =>  bcrypt($request->input('password'))
            ]
        );

        $notification   =   'El registro se ha creado correctamente';
        return redirect('/medicos')->with(compact('notification'));
    }


    public function show(string $id)
    {
        
    }


    public function edit(string $id)
    {   
        $doctor = User::doctors()->findOrFail($id);
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'name'      =>  'required|min:3',
            'email'     =>  'required|email',
            'cedula'    =>  'required|min:6|max:10',
            'address'   =>  'nullable|min:6',
            'phone'      => 'required|min:10',

        ];

        $messages   =   [
            'name.required'     =>  'El campo nombre es obligatorio',
            'name.min'          =>  'El campo nombre debe tener más de 3 carácteres',
            'email.required'    =>  'El campo email es obligatorio',
            'email.email'       =>  'Ingresa un email valido',
            'cedula.required'   =>  'El campo documento es obligatorio',
            'cedula.min'        =>  'El documento debe tener mínimo 6 carácteres',
            'cedula.max'        =>  'El documento debe tener máximo 10 carácteres',
            'address.min'       =>  'El campo dirección debe contener mínimo 6 carácteres',
            'phone.required'    =>  'El campo teléfono es obligatorio',
        ];

        $this->validate($request, $rules, $messages);

        $user       =   User::doctors()->findOrFail($id);
        $data       =   $request->only('name','email','cedula','address','phone');
        $password   =   $request->input('password');

        if($password)
            $data['password']   =   bcrypt($password);

        $user->fill($data);
        $user->save();

        $notification   =   'El registro se ha actualizado correctamente';
        return redirect('/medicos')->with(compact('notification'));
    }

    public function destroy(string $id)
    {
        $user           =   User::doctors()->findOrFail($id);
        $doctorName     =   $user->name;
        $user->delete();

        $notification   =   "El registro $doctorName se ha eliminado correctamente";
        return redirect('/medicos')->with(compact('notification'));
    }
}
