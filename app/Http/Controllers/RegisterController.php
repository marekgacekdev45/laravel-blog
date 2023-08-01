<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store(){
       $attributes =  request()->validate([
            'name' => 'required|max:255', 
            // 'username' => 'required|max:255|min:3|unique:users,username',
            'username' => ['required','max:255','min:3',Rule::unique('users','username')],
            'email' => ['required','max:255','min:3','email',Rule::unique('users','email')],
            'password' => 'required|min:7|max:255',
        ]);
    
        User::create($attributes);

        // session()->flash('success','Your account has been created');


        return redirect('/')->with('success','Your account has been created');
    }
}
