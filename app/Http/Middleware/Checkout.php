<?php

namespace App\Http\Middleware;

use App\Helper\CartHelper;
use Closure;
use Illuminate\Http\Request;

class Checkout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    
        $cart = $request->session()->get('cart'); 
        if ($cart) {
            return $next($request);
        } else {
            toast('Your cart is empty!','error','bottom-end');
            return redirect()->route('show-cart');
        }
    }
}