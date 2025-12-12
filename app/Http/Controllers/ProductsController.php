<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductsController extends Controller
{
    public function updateFeature(Request $request)
{
    $request->validate([
        'id' => 'required|integer',
        'feature' => 'required|string|in:Yes,No'
    ]);

    $product = Product::find($request->id);

    if (! $product) {
        return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
    }

    // Ensure column name is 'feature' in DB
    $product->feature = $request->feature;
    $product->save();

    return response()->json(['success' => true, 'message' => 'Feature updated successfully.']);
}
    public function index()
    {
        $products = DB::table('products')
            ->leftJoin('products_category', 'products.category_id', '=', 'products_category.pid')
            ->leftJoin('products_subcategory', 'products.sub_category_id', '=', 'products_subcategory.products_subcategory_id')
            ->leftJoin('price_range', 'products.price_id', '=', 'price_range.range_id')
            ->select(
                'products.*',
                'products_category.category_name',
                'products_subcategory.name as subcategory_name',
                'price_range.from_price',
                'price_range.to_price'
            )
            ->orderByDesc('products.id')->get();

        $prices = DB::table('price_range')->get();

        return view('products.index', compact('products', 'prices'));
    }

    public function productDetails($id)
{
    $banners = Banner::all();

    $product = DB::table('products')
        ->leftJoin('products_category', 'products.category_id', '=', 'products_category.pid')
        ->leftJoin('products_subcategory', 'products.sub_category_id', '=', 'products_subcategory.products_subcategory_id')
        ->leftJoin('price_range', 'products.price_id', '=', 'price_range.range_id')
        ->select(
            'products.*',
            'products_category.category_name',
            'products_subcategory.name as subcategory_name',
            'price_range.from_price',
            'price_range.to_price'
        )
        ->where('products.id', $id) // use ID instead of slug
        ->first();

    if (!$product) {
        return redirect('/')->with('error', 'Product not found');
    }

    $productImages = [];
    if ($product->multiple_img) {
        $productImages = json_decode($product->multiple_img, true);
    }

    return view('projectdetails', compact('product', 'banners', 'productImages'));
}


public function create()
{
    // Load categories
    $categories = DB::table('products_category')
        ->select('pid', 'category_name')
        ->get();

    // Load ALL subcategories (so you can filter in Blade)
    $subcategories = DB::table('products_subcategory')
        ->select('products_subcategory_id', 'name', 'pid')
        ->get();

    // Price ranges
    $prices = DB::table('price_range')
        ->select('range_id', 'from_price', 'to_price')
        ->get();

    return view('products.create', compact('categories', 'subcategories', 'prices'));
}

 
public function store(Request $request)
{
    $request->validate([
        'product_name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:products,slug',
        'category_id' => 'required|integer',
        'sub_category_id' => 'nullable|integer',
        'price_id' => 'nullable|string',

        'multiple_img.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'banner.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

        'f_que' => 'nullable|array',
        'f_que.*' => 'nullable|string|max:255',
        'f_ans' => 'nullable|array',
        'f_ans.*' => 'nullable|string',
    ]);

    // FAQ arrays
    $f_que = $request->f_que ? array_filter($request->f_que) : [];
    $f_ans = $request->f_ans ? array_map(function($a){ return $a ?? ''; }, $request->f_ans) : [];
    if(count($f_que) !== count($f_ans)) {
        $f_ans = array_pad($f_ans, count($f_que), '');
    }

    // Multiple Images
    $images = [];
    if ($request->hasFile('multiple_img')) {
        foreach ($request->file('multiple_img') as $file) {
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $fileName);
            $images[] = 'uploads/products/'.$fileName;
        }
    }

    // Banner Images
    $banners = [];
    if ($request->hasFile('banner')) {
        foreach ($request->file('banner') as $file) {
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $fileName);
            $banners[] = 'uploads/products/'.$fileName;
        }
    }

    DB::table('products')->insert([
        'product_name' => $request->product_name,
        'slug' => $request->slug,
        'category_id' => $request->category_id,
        'sub_category_id' => $request->sub_category_id,
        'price_id' => $request->price_id,
        'multiple_img' => json_encode($images),
        'banner' => json_encode($banners),
        'specification' => $request->specification,
        'description' => $request->description,
        'f_que' => json_encode($f_que),
        'f_ans' => json_encode($f_ans),
        'feature' => $request->feature ?? null,
        'toprated' => $request->toprated ? 1 : 0,
        'premium' => $request->premium ? 1 : 0,
        'meta_title' => $request->meta_title,
        'meta_key' => $request->meta_key,
        'meta_description' => $request->meta_description,
        'status' => $request->status,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect()->route('products.index')->with('success', 'Product added successfully.');
}

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product) return redirect()->route('products.index')->with('error', 'Product not found.');

        $categories = DB::table('products_category')->get();
        $subcategories = DB::table('products_subcategory')->get();
        $prices = DB::table('price_range')->get();

        // ✅ decode FAQ json
        $f_que = json_decode($product->f_que ?? '[]');
        $f_ans = json_decode($product->f_ans ?? '[]');

        return view('products.edit', compact('product','categories','subcategories','prices','f_que','f_ans'));
    }

   
public function update(Request $request, $id)
{
    $request->validate([
        'product_name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:products,slug,'.$id,
        'category_id' => 'required|integer',
        'sub_category_id' => 'nullable|integer',
        'price_id' => 'nullable|string',

        'multiple_img.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'banner.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

        'f_que' => 'nullable|array',
        'f_que.*' => 'nullable|string|max:255',
        'f_ans' => 'nullable|array',
        'f_ans.*' => 'nullable|string',
    ]);

    $product = DB::table('products')->where('id', $id)->first();

    // FAQ arrays
    $f_que = $request->f_que ? array_filter($request->f_que) : [];
    $f_ans = $request->f_ans ? array_map(function($a){ return $a ?? ''; }, $request->f_ans) : [];
    if(count($f_que) !== count($f_ans)) {
        $f_ans = array_pad($f_ans, count($f_que), '');
    }

    // Existing images
    $images = $product->multiple_img ? json_decode($product->multiple_img, true) : [];
    if ($request->hasFile('multiple_img')) {
        foreach ($request->file('multiple_img') as $file) {
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $fileName);
            $images[] = 'uploads/products/'.$fileName;
        }
    }

    // Existing banners
    $banners = $product->banner ? json_decode($product->banner, true) : [];
    if ($request->hasFile('banner')) {
        foreach ($request->file('banner') as $file) {
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $fileName);
            $banners[] = 'uploads/products/'.$fileName;
        }
    }

    DB::table('products')->where('id', $id)->update([
        'product_name' => $request->product_name,
        'slug' => $request->slug,
        'category_id' => $request->category_id,
        'sub_category_id' => $request->sub_category_id,
        'price_id' => $request->price_id,
        'multiple_img' => json_encode($images),
        'banner' => json_encode($banners),
        'specification' => $request->specification,
        'description' => $request->description,
        'f_que' => json_encode($f_que),
        'f_ans' => json_encode($f_ans),
        'feature' => $request->feature ?? null,
        'toprated' => $request->toprated ? 1 : 0,
        'premium' => $request->premium ? 1 : 0,
        'meta_title' => $request->meta_title,
        'meta_key' => $request->meta_key,
        'meta_description' => $request->meta_description,
        'status' => $request->status,
        'updated_at' => now()
    ]);

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('products.index')->with('success','🗑️ Product deleted successfully.');
    }
    

  

}
