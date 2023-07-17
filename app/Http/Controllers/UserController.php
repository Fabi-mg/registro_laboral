<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=> ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    public function create(Request $request){

        $this->validator($request->all())->validate();

        User::create([
            'name'=> $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'rol'=> $request['rol'],
        ]);

        return redirect()->route('fichar-admin');
    }






}
