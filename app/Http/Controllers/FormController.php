<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Product;

class FormController extends Controller
{
    public function index()
    {
        //dd (auth()->user()->form->status);

        $forms = Form::all();
        //Validate if user has already a form
        // if(auth()->user()->form == null){
        //     return view('listforders');
        // }

        return view('listoforders',compact('forms'));
    }   

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        
        //validate the data
        $request->validate([
            'date'              => ['required'],
            'firstname'         => ['required'],
            'lastname'          => ['required'],
            'type_of_delivery'  => ['required'],
            'delivery_address'  => ['nullable'],
            'food_item'         => ['required'],
            'food_quantity'     => ['required'],
        ]);

        $item = Product::where('name', $request->food_item)->first();

        //store the data
        Form::create([
            'user_id'           => auth()->user()->id,        
            'date'              => $request->date,
            'firstname'         => $request->firstname,
            'lastname'          => $request->lastname,
            'type_of_delivery'  => $request->type_of_delivery,
            'delivery_address'  => $request->delivery_address,
            'food_item'         => $request->food_item,
            'food_quantity'     => $request->food_quantity,
            'food_price'        => $item->price * $request->food_quantity,
        ]);

        //return to form
        return redirect()->back();

    }
 
}
