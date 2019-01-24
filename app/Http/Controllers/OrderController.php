<?php

namespace App\Http\Controllers;

use DB;

class OrderController extends Controller {

    public function index() {
        $orders = DB::table('orders')
                ->leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
                ->leftJoin('payments', 'orders.id', '=', 'payments.order_id')
                ->select('orders.*', 'customers.full_name','payments.*')
                ->get();
        return view('admin.order.manageOrder', ['orders' => $orders]);
    }

}
