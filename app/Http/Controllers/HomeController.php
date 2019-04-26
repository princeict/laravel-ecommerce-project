<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.home.homeContent');
    }
    
//    public function get_product_price() {
//        $products = DB::table('products')
//                ->select('productPrice')
//                ->get();
//        //json_encode($products);
//        $point_value = array();
//        foreach ($products as $item) {
//            array_push($point_value, $item->productPrice);
//        }
////        
//       //dd(str_replace('"', '', json_encode($point_value)));
//       
//      // echo str_replace('"', '', json_encode($point_value)); 
//
////        return view('admin.home.get_product_price', compact('point_value'));
//        return view('admin.home.get_product_price', compact('point_value'));
//    }
}
