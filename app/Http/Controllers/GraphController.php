<?php

namespace App\Http\Controllers;

use DB;

class GraphController extends Controller
{
     public function get_product_price() {
        $products = DB::table('products')
                ->select('productPrice')
                ->get();

        $point_value = array();
        foreach ($products as $item) {
            array_push($point_value, $item->productPrice);
        }
        return view('admin.home.get_product_price', compact('point_value'));
    }
}
