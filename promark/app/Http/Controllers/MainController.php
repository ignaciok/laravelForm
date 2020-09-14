<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function save(Request $request){
        
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'birthdate'=>'required',
            'color'=>'required'
        ]);

        $formData = new \App\Models\FormData;
        $formData->name = $request->name;
        $formData->email = $request->email;
        $formData->birthdate = $request->birthdate;
        $formData->color = $request->color;

        try{
        $formData->save();
        }  catch(\Exception $e){
            return back()->with('error','the email is already registered!');
        }
        return back()->with('message','success!');
    }
}
