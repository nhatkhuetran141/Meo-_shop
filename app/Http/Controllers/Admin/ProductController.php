<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\order_detail;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct()
    {
        $listProducts = Product::orderBy("created_at", 'DESC')->paginate(10); 
        // dd($listProducts); 
        $counter = 1;

        return view('admin.product.index', compact('listProducts', 'counter'));
    }

    public function showCreateProduct()
    {
        $cates = category::orderby('name', 'ASC')->get();
        return view('admin.product.create', compact('cates'));
    }

    protected function validateProduct(Request $request)
    {
        $result = $request->validate([
            'prd_name' => 'required',
            'prd_category' => 'required',
            'prd_price' => 'required|numeric',
            'prd_discount' => 'nullable|numeric',
            "prd_short_descrip" => 'required|max:150',
            'prd_description' => 'required',
            "prd_ava" => 'required',
        ], [
            'prd_name.required' => 'This field is required',
            'prd_category.required' =>  'This field is required',
            'prd_price.required' =>  'This field is required',
            "prd_short_descrip.required" => 'This field is required',
            "prd_description.required" => 'This field is required',
            "prd_ava.required" => 'This field is required',
        ]);
    }

    public function storeProduct(Request $request)
    {
        // dd($request->all());
        $this->validateProduct($request);

        $product = new Product();
        $product->name = $request->prd_name;
        $product->slug = Str::slug($request->prd_name);
        $product->category_id = $request->prd_category;
        $product->price = $request->prd_price;
        $product->discount = $request->prd_discount / 100;
        $product->is_stock = $request->prd_is_stock;
        $product->short_description = $request->prd_short_descrip;
        $product->description = $request->prd_description;
        $product->image = $request->prd_ava;
        $product->list_image = $request->prd_list_images;

        $product->save();
        alert()->success('Product Created!', 'Successfully');
        return redirect()->route('show-product');
    }

    public function showEditProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->discount *= 100;
        $cates = category::orderby('name', 'ASC')->get();
        return view('admin.product.edit', compact('product', 'cates'));
    }

    public function updateProduct(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        // dd($request); 
        $this->validateProduct($request);

        $product->name = $request->prd_name;
        $product->slug = Str::slug($request->prd_name);
        $product->category_id = $request->prd_category;
        $product->price = $request->prd_price;
        $product->discount = $request->prd_discount / 100;
        $product->is_stock = $request->prd_is_stock;
        $product->short_description = $request->prd_short_descrip;
        $product->description = $request->prd_description;
        $product->image = $request->prd_ava;
        $product->list_image = $request->prd_list_images;

        $product->save();
        alert()->success('Product Edited!', 'Successfully');
        return redirect()->route('show-product');
    }

    public function deleteProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $isOrderd = order_detail::where('product_id', '=', $product->id)->first();
        if (!$isOrderd) {
            $product->delete();
            alert()->success('Product Deleted!', 'Successfully');
        } else {
            alert()->error('Error', 'This product has existed in an orderd');
        }

        return redirect()->route('show-product');
    }
}