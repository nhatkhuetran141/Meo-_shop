<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\order_detail;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{

    public function index()
    {
        return view('client.checkout.index');

    }

    public function store(Request $request, CartHelper $cart)
    {
        $request->validate([
            'ord_address' => 'required|min:4',
            'ord_customer' => 'required|min:4',
            'ord_email' => 'required|email',
            'ord_phone' => 'required|numeric|min:5',
        ]); 
    
        $order_adress = $request->ord_address . ", " . $request->ord_province;
        $order_quantity = $cart->total_quantity; 
        $order_total = $cart->total_price; 
        $order_total_without_discount = $cart->total_price_without_discount; 

        if ($order = Order::create([
            'customer_name' => $request->ord_customer,
            'email' => $request->ord_email ,
            'address'=> $order_adress,
            'phone'=> $request->ord_phone,
            'note'=> $request->ord_note,
            'amount_product'=> $order_quantity,
            'origin_total'=> $order_total_without_discount,
            'last_total'=> $order_total,
        ])) {
            $order_id = $order->id; 
            foreach ($cart->items as $product_id => $item) {
                $quantity = $item['quantity']; 
                $price = $item['finalPrice']; 

                order_detail::create([
                    'order_id' => $order_id,
                    'product_id' => $product_id, 
                    'price' => $price, 
                    'quantity' => $quantity, 
                ]); 
                # code...
            }

            Mail::send('mail.orderConfirm', [
                'order' => $order, 
                'cart' => $cart, 
                'items' => $cart->items, 
            ], function($email) use($order) { 
                $email->subject('Your order from MeowShop'); 
                $email->to($order->email); 
            });
            
            session(['cart' => '']); 

            return redirect()->route('successful-order'); 
        
        } else {
            return redirect()->route('home-page'); 

        }

    }

    public function testMail()
    {

        Mail::send('mail.test', [
            
        ], function($email)  { 
            $email->subject('Your order from MeowShop'); 
            $email->to("19520666@gm.uit.edu.vn"); 
        });
    }
}