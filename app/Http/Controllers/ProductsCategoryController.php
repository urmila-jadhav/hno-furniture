<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductsCategoryController extends Controller
{

    public function categoryDetails($id)
{
    // Fetch category
    $category = DB::table('products_category')
        ->where('pid', $id)
        ->first();

    if (!$category) {
        abort(404);
    }

    // ✅ FIXED: use pid (category id)
    $subcategories = DB::table('products_subcategory')
        ->where('pid', $id)
        ->get();

    // All categories (for related links)
    $categories = DB::table('products_category')->get();

    return view('categorydetails', compact(
        'category',
        'subcategories',
        'categories'
    ));
}

    public function index()
    {
        $categories = DB::table('products_category')
            ->orderByDesc('pid')
            ->get();

        return view('productscategories.index', compact('categories'));
    }

    public function create()
    {
        return view('productscategories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name'   => 'required|string|max:45',
            'category_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'banner_image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'description'     => 'nullable|string',
        ]);

        // Convert FAQ arrays to JSON
        $faqQ = $request->faq_question ? array_filter($request->faq_question) : [];
        $faqA = $request->faq_answer ? array_filter($request->faq_answer) : [];

        $data = [
            'category_name' => $request->category_name,
            'description'   => $request->description,
            'faq_question'  => json_encode($faqQ),
            'faq_answer'    => json_encode($faqA),
           
        ];

        //Upload Category Image
        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            if (!File::exists(public_path('uploads/categories'))) {
                File::makeDirectory(public_path('uploads/categories'), 0777, true);
            }
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/categories'), $imageName);
            $data['category_image'] = 'uploads/categories/' . $imageName;
        }

        // Banner Image
        if ($request->hasFile('banner_image')) {
            $banner = $request->file('banner_image');
            if (!File::exists(public_path('uploads/category_banners'))) {
                File::makeDirectory(public_path('uploads/category_banners'), 0777, true);
            }
            $bannerName = time() . '_banner_' . uniqid() . '.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/category_banners'), $bannerName);
            $data['banner_image'] = 'uploads/category_banners/' . $bannerName;
        }

        DB::table('products_category')->insert($data);

        return redirect()->route('products.categories.index')->with('success', '✅ Category & FAQs added successfully.');
    }

    public function edit($id)
    {
        $category = DB::table('products_category')->where('pid', $id)->first();

        if (!$category) {
            return redirect()->route('products.categories.index')->with('error', '❌ Category not found.');
        }

        return view('productscategories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name'   => 'required|string|max:45',
            'category_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'banner_image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'description'     => 'nullable|string',
        ]);

        $category = DB::table('products_category')->where('pid', $id)->first();

        if (!$category) {
            return redirect()->route('products.categories.index')->with('error', '❌ Category not found.');
        }

        // ✅ Convert FAQ arrays to JSON
        $faqQ = $request->faq_question ? array_filter($request->faq_question) : [];
        $faqA = $request->faq_answer ? array_filter($request->faq_answer) : [];

        $data = [
            'category_name' => $request->category_name,
            'description'   => $request->description,
            'faq_question'  => json_encode($faqQ),
            'faq_answer'    => json_encode($faqA),
           
        ];

        // Replace Category Image
        if ($request->hasFile('category_image')) {
            if ($category->category_image && File::exists(public_path($category->category_image))) {
                File::delete(public_path($category->category_image));
            }

            $image = $request->file('category_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!File::exists(public_path('uploads/categories'))) {
                File::makeDirectory(public_path('uploads/categories'), 0777, true);
            }

            $image->move(public_path('uploads/categories'), $imageName);
            $data['category_image'] = 'uploads/categories/' . $imageName;
        }

        //  Replace Banner Image
        if ($request->hasFile('banner_image')) {
            if ($category->banner_image && File::exists(public_path($category->banner_image))) {
                File::delete(public_path($category->banner_image));
            }

            $banner = $request->file('banner_image');
            $bannerName = time() . '_banner_' . uniqid() . '.' . $banner->getClientOriginalExtension();

            if (!File::exists(public_path('uploads/category_banners'))) {
                File::makeDirectory(public_path('uploads/category_banners'), 0777, true);
            }

            $banner->move(public_path('uploads/category_banners'), $bannerName);
            $data['banner_image'] = 'uploads/category_banners/' . $bannerName;
        }

        DB::table('products_category')->where('pid', $id)->update($data);

        return redirect()->route('products.categories.index')->with('success', '✅ Category & FAQs updated successfully.');
    }

    public function destroy($id)
    {
        $category = DB::table('products_category')->where('pid', $id)->first();

        if (!$category) {
            return redirect()->route('products.categories.index')->with('error', '❌ Category not found.');
        }

        if ($category->category_image && File::exists(public_path($category->category_image))) {
            File::delete(public_path($category->category_image));
        }

        if ($category->banner_image && File::exists(public_path($category->banner_image))) {
            File::delete(public_path($category->banner_image));
        }

        DB::table('products_category')->where('pid', $id)->delete();

        return redirect()->route('products.categories.index')->with('success', '🗑️ Category deleted successfully.');
    }
}
