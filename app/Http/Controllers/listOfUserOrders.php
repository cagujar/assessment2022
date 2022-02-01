<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use App\Models\Product;

class listOfUserOrders extends Controller
{
    //
    public function placeOrder()
    {
        $products = Product::all();

        return view('placeorder', compact('products'));
    }

    public function orderList()
    {
      
        # code...
         //get all forms
         $forms = Form::with('user')->get();

        //dd($forms);
         //return to dashboard
         return view('listoforders', compact('forms'));
    }

    public function show(Form $form)
    {
        # code..
        //return to form.view page

        return view('form.view',compact('form'));

    }

    public function acceptOrder(Form $form)
    {
        # code...
        //dd($form);

        //update the form status from pending to done
        $form->update([
            'status'          => 'Done',
            'delivery_status' => 'Being Delivered'
        ]);

        //back to the list of order
        return redirect()->back();

    }


    
}
