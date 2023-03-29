<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployController extends Controller
{
    public function index(){
    return view('pages.index');

    }
    
    public function add(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required|max:11',
        ]);

        // Employer::created([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'address' => $request->address,
        //     'phone' => $request->phone,
        // ]);

        $emplyer =  new Employer();
        $emplyer->name = $request->name;
        $emplyer->email = $request->email;
        $emplyer->address = $request->address;
        $emplyer->phone = $request->phone;
        $emplyer->save();

        return response()->json(['success' => 'Employer added successfully']);
    }//end method


    public function getData(){
        $emplyer =  Employer::all();
        return response()->json(['success' => $emplyer]);

    }//end method

    public function getEmployer($id){
        $emplyer = Employer::findOrFail($id);
        return response()->json(['success' => $emplyer]);
    }//end method

    public function update(Request $request){

        $emplyer = Employer::findOrFail($request->id);
        $emplyer->name = $request->name;
        $emplyer->email = $request->email;
        $emplyer->address = $request->address;
        $emplyer->phone = $request->phone;
        $emplyer->update();
        return response()->json(['success' => 'Emplyer update successfuly']);
    }

    public function delete(Request $request){
        Employer::findOrFail($request->id)->delete();
        return response()->json(['success'=>'Employer deleted successfuly']);
    }//emd method
}
