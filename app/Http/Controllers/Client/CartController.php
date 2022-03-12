<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Aler;
Use Alert;
class CartController extends Controller
{
    public function index()
    {
        return view('client.shoppingcart.index');
    }

    public function add(CartHelper $cart, $id, Request $request)
    {
        $quantity = 1; 
        if ($request->quantity) {
            $quantity = $request->quantity; 
        };
        $product = Product::find($id);

        $cart->add($product, $quantity); 
      
        if ($request['checkout']) {
            return redirect()->route('show-checkout');
        }
        toast('Product added!','success');
        return redirect()->back(); 
    }
    
    public function remove(CartHelper $cart, $id)
    {
       
        $cart->remove($id); 
        return redirect()->back(); 
    }

    public function update(CartHelper $cart, Request $request)
    {
        $cart->update($request); 

        // return redirect()->back(); 
        toast('Shopping cart updated!','success');

        return redirect()->back(); 
    }

    public function clear(CartHelper $cart)
    {
       $cart->clear();
       return redirect()->back(); 
    }

}