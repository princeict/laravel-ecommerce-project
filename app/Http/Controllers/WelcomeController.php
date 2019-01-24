<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;

class WelcomeController extends Controller {

    public function index() {
//        $data = 1;
        $publishProducts = Product::where('publicationStatus', 1)->get();
        return view('frontEnd.home.homeContent', ['publishProducts' => $publishProducts]);

//        return view('index', compact('data'));
//        return view('index', ['data' => $data]);
//        return view('index')->with('data' $data);
    }

    public function category($id = 0) {
        $publishedCategoryProducts = Product::where('categoryId', $id)
                ->where('publicationStatus', 1)
                ->get();
        return view('frontEnd.category.categoryContent', ['publishedCategoryProducts' => $publishedCategoryProducts]);
    }

    public function contact() {
        return view('frontEnd.contact.contactContent');
    }

    public function productDetails($id = 0) {
        $productInfoById = Product::where('id', $id)->first();
        return view('frontEnd.product.productContent', ['productInfoById' => $productInfoById]);
    }

    public function checkOut() {
        return view('frontEnd.checkout.checkoutContent');
    }

}
