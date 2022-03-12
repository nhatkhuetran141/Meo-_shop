<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showProducts()
    {
        $listProducts = Product::orderBy("created_at", 'DESC')->paginate(9); 
        $listCategories = category::all(); 
        $trendingProducts = $this->getTrendingProducts(4); 
        
        return view('client.products.index', compact('listProducts', 'listCategories', 'trendingProducts'));
    }

    public function getTrendingProducts($numberItem = 5)
    {
        $trendingProducts = DB::table('products')
        ->select('order_details.product_id', 'products.*', DB::raw("COUNT('products.id') AS product_count"))
        ->join('order_details', 'order_details.product_id', '=', 'products.id')
        ->orderBy('product_count', 'desc')
        ->groupBy('order_details.product_id')
        ->take($numberItem)
        ->get();

        return $trendingProducts;
    }

    public function getTrendingProductsByCategory($numberItem = 5, $category)
    {
        $trendingProducts = DB::table('products')
        ->where('category_id', '=', $category)
        ->select('order_details.product_id', 'products.*', DB::raw("COUNT('products.id') AS product_count"))
        ->join('order_details', 'order_details.product_id', '=', 'products.id')
        ->orderBy('product_count', 'desc')
        ->groupBy('order_details.product_id')
        ->take($numberItem)
        ->get();

        return $trendingProducts;
    }

    public function showProductsByCategory($slug)
    {
        $listCategories = category::all(); 
        if (category::where('slug', $slug)->exists()) {
            $selectedCategory = category::where('slug', $slug)->first(); 
            $listProducts = Product::where('category_id', $selectedCategory->id)->orderBy("created_at", 'DESC')->paginate(9); 
        }
        $trendingProducts = $this->getTrendingProducts(4); 
        return view('client.products.index', compact('listProducts', 'listCategories', 'trendingProducts'));
    }

    public function showProductDetail($slug)
    {
        $product = Product::where('slug',$slug)->first(); 
        $relatedProducts = Product::where('category_id', '=' ,$product->category_id)->where('id', '<>', $product->id)->orderBy("created_at", 'DESC')->take(4)->get(); 

        return view('client.products.product-detail', compact('product', 'relatedProducts'));
    }

    public function resultsearch()
    {
        $array_can_tim = array(); 
        if ($gt_search = request()->search) { 
          $array_can_tim = Product::orderBy('created_at', 'DESC')->where('name', 'like', '%'.$gt_search.'%')->paginate(6);
        }
  
        return view('client.resultsearch.index',[
            'data'=>$array_can_tim,
            'search_name' =>$gt_search
        ]);
    }

    public function productTrendingHomePage()
    {
        $trendingProducts = $this->getTrendingProducts(8); 
       
        return view('client.home.index', compact('trendingProducts'));
    }
}