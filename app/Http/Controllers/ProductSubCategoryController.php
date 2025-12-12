<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductSubCategoryController extends Controller
{
    // public function index()
    // {
    //     $subcategories = DB::table('products_subcategory')
    //         ->orderBy('products_subcategory_id', 'desc')
    //         ->get();

    //     return view('productsubcategory.index', compact('subcategories'));
    // }


public function index(Request $request)
{
    // Get the search term from query string
    $search = $request->input('search');

    // Start query builder
    $query = DB::table('products_subcategory');

    // Apply search filter if search term exists
    if ($search) {
        $query->where('name', 'like', "%{$search}%");
    }

    // Order results and get
    $subcategories = $query->orderBy('products_subcategory_id', 'desc')->get();

    // Pass subcategories and search term to view
    return view('productsubcategory.index', compact('subcategories', 'search'));
}

    public function create()
    {
        $categories = DB::table('products_category')
            ->select('pid', 'category_name')
            ->orderBy('category_name', 'asc')
            ->get();

        return view('productsubcategory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pid' => 'required|integer',
            'name' => 'required|string|max:255',
            'sub_category_img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('sub_category_img')) {
            $file = $request->file('sub_category_img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/subcategories'), $filename);
            $imagePath = 'uploads/subcategories/' . $filename;
        }

        DB::table('products_subcategory')->insert([
            'pid' => $request->pid,
            'name' => $request->name,
            'sub_category_img' => $imagePath,
        ]);

        return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully!');
    }

   

public function edit($id)
{
    $subcategory = DB::table('products_subcategory')->where('products_subcategory_id', $id)->first();
    $categories = DB::table('products_category')->select('pid', 'category_name')->get();

    if (!$subcategory) {
        return redirect()->route('subcategories.index')->with('error', 'Subcategory not found.');
    }

    return view('productsubcategory.edit', compact('subcategory', 'categories'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'pid' => 'required|integer',
        'name' => 'required|string|max:255',
        'sub_category_img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $subcategory = DB::table('products_subcategory')
        ->where('products_subcategory_id', $id)
        ->first();

    if (!$subcategory) {
        return redirect()->route('subcategories.index')->with('error', 'Subcategory not found.');
    }

    $imagePath = $subcategory->sub_category_img;

    if ($request->hasFile('sub_category_img')) {

        // Delete old file if exists
        if ($imagePath && File::exists(public_path($imagePath))) {
            File::delete(public_path($imagePath));
        }

        // Upload new image
        $file = $request->file('sub_category_img');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/subcategories'), $filename);
        $imagePath = 'uploads/subcategories/'.$filename;
    }

    DB::table('products_subcategory')
        ->where('products_subcategory_id', $id)
        ->update([
            'pid' => $request->pid,
            'name' => $request->name,
            'sub_category_img' => $imagePath,
        ]);

    return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully!');
}

    public function destroy($id)
    {
        $subcategory = DB::table('products_subcategory')->where('products_subcategory_id', $id)->first();

        if (!$subcategory) {
            return redirect()->route('subcategories.index')->with('error', 'Subcategory not found.');
        }

        if ($subcategory->sub_category_img && File::exists(public_path($subcategory->sub_category_img))) {
            File::delete(public_path($subcategory->sub_category_img));
        }

        DB::table('products_subcategory')->where('products_subcategory_id', $id)->delete();

        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully!');
    }
}
