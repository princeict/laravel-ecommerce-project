<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use App\Shipping;
use App\Order;
use App\OrderDetail;
use App\Payment;
use Cart;

class CheckoutController extends Controller {

    public function index() {
        return view('frontEnd.checkout.checkoutContent');
    }

    public function customerRegistration(Request $request) {
        $customer = new Customer();
        $customer->fullName = $request->fullName;
        $customer->districtName = $request->districtName;
        $customer->emailAddress = $request->emailAddress;
        $customer->address = $request->address;
        $customer->phoneNumber = $request->phoneNumber;
        $customer->password = bcrypt($request->password);
        $customer->save();
        $customerId = $customer->id;
        Session::put('customerId', $customerId);
        return redirect('/checkout/shipping');
    }

    public function showShippingForm() {
        $customerId = Session::get('customerId');
        $customerById = Customer::where('id', $customerId)->first();
        return view('frontEnd.checkout.shippingContent', ['customerById' => $customerById]);
    }

    public function saveShippingForm(Request $request) {
        $shipping = new Shipping();
        $shipping->fullName = $request->fullName;
        $shipping->emailAddress = $request->emailAddress;
        $shipping->address = $request->address;
        $shipping->phoneNumber = $request->phoneNumber;
        $shipping->save();
        $shippingId = $shipping->id;
        Session::put('shippingId', $shippingId);
        return redirect('/checkout/paymentInfo');
    }

    public function paymentInfo() {
        return view('frontEnd.checkout.paymentInfocontent');
    }

    public function saveOrderInfo(Request $request) {

        $paymentType = $request->paymentType;

        $order = new Order();
        $order->customer_id = Session::get('customerId');
        $order->shipping_id = Session::get('shippingId');
        $order->order_total = Session::get('orderTotal');
        $order->save();
        Session::put('orderId', $order->id);

        $payment = new Payment();
        $payment->order_id = Session::get('orderId');
        $payment->payment_type = $paymentType;
        $payment->save();

        $orderDetails = new OrderDetail();
        $cartProducts = Cart::content();

        foreach ($cartProducts as $item) {
            $orderDetails->order_id = Session::get('orderId');
            $orderDetails->product_id = $item->id;
            $orderDetails->product_name = $item->name;
            $orderDetails->product_price = $item->price;
            $orderDetails->product_quantity = $item->qty;
            $orderDetails->save();
        }

        if ($paymentType == 'cash') {

            return redirect('/customer/customer-home');
        } else if ($paymentType == 'paypal') {
            //do not done
        } else if ($paymentType == 'bkash') {
            //do not done
        }
    }

    public function customerLogout() {
        Session::forget('customerId');
        return redirect('/');
    }

    public function customerLogin(Request $request) {
        $emailAddress = $request->emailAddress;
        $customerByEmail = Customer::where('emailAddress', $emailAddress)->first();
        $existingPassword = $customerByEmail->password;

        if (password_verify($request->password, $existingPassword)) {
            Session::put('customerId', $customerByEmail->id);
            return redirect('/checkout/shipping');
        } else {
            return redirect('/checkout')->with('message', 'Invalid email and password');
        }
    }

}
