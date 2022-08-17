<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
//use App\Http\Controllers\RegController;

class RegController extends Controller
{


    function register(Request $request){

        // User::insert([
        //     'name'=> $request->name,
        //     'email'=> $request->email,
        //     'password'=> bcrypt($request->password),
        //     'created_at' =>Carbon::now(),

        // ]);
        return $request->all();

  
        //return view('register');
    }


    function store(Request $request){


            User::insert([
                        'name'=> $request->name,
                        'email'=> $request->email,
                        'password'=> bcrypt($request->password),
                        'created_at' =>Carbon::now(),

                    ]);
                    

    }
}
