<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
   public function customerHome(){
        return view('frontEnd.customer.customer');
    }
}
