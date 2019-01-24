<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;

class CartController extends Controller {

    public function showCart() {
        $contents = Cart::content();
        return view('frontEnd.cart.cartContent', ['contents' => $contents]);
    }

    public function addCart(Request $request) {
        // return view('frontEnd.cart.cartContent');

        $productQty = $request->productQuantity;
        $productId = $request->productId;

        $productInfo = DB::table('products')
                ->where('id', $productId)
                ->first();


        $data = array();
        $data['id'] = $productInfo->id;
        $data['name'] = $productInfo->productName;
        $data['price'] = $productInfo->productPrice;
        $data['qty'] = $productQty;
        $data['options']['image'] = $productInfo->productImage;


        // Cart::destroy();


        Cart::add($data);

        return redirect('/showCart');
    }

    public function deleteCart(Request $request) {
        $rowId = $request->rowId;
        Cart::update($rowId, 0);
        return redirect('/showCart');
    }

    public function updateCart(Request $request) {
        $rowId = $request->rowId;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        return redirect('/showCart');
    }

}
