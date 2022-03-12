<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    public function showCategory()
    {
        $listCates = category::all();
        $counter = 1;
        return view('admin.category.index', compact('listCates', 'counter'));
    }

    public function showCreateCategory()
    {
        return view('admin.category.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'cateName' => 'required|min:4'
        ], [
            'cateName.required' => 'Vui long khong bo trong',
            'cateName.min' => 'Vui lòng nhập nhiều hơn xíu'
        ]);
        $category = new category();
        $category->name = $request->cateName;
        $category->slug = Str::slug($request->cateName);
        $category->save();
        alert()->success('Category Created!', 'Successfully');
        return redirect()->route('show-category');
    }

    public function showEditCategory($slug)
    {
        $category = category::where('slug', $slug)->first();

        return view('admin.category.edit', compact('category'));
    }

    public function updateCategory(Request $request, $slug)
    {
        $category = category::where('slug', $slug)->first();
        $category->name = $request->cateName;
        $category->slug = Str::slug($request->cateName);
        $category->save();
        alert()->success('Category Updated', 'Successfully');
        return redirect()->route('show-category');
    }

    public function deleteCategory($slug)
    {
        $category = category::where('slug', $slug)->first();
        $hasProduct = Product::where('category_id', '=', $category->id)->first();
        if (!$hasProduct) {
            $category->delete();
            alert()->success('Category Deleted!', 'Successfully');
        } else {
            alert()->error('Error', 'This category has included a product');
        }
        return redirect()->route('show-category');
    }
}
