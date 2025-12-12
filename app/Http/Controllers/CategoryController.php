<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
use App\Models\Category;



class CategoryController extends Controller
{
    public function index()
    {
        $maincategory = DB::table('category')
            ->orderByDesc('category_id')
            ->get();

        return view('category.index', compact('maincategory'));
    }


        /**
     * Show form for creating a new category.
     */
    public function create()
    {
        return view('category.create');
    }


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_description' => 'required|string',
        'category_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $path = null;
    if ($request->hasFile('category_image')) {
        $path = $request->file('category_image')->store('category', 'public');
    }

    Category::create([
        'category_name' => $request->name,
        'category_description' => $request->category_description,
        'category_image' => $path,
    ]);

    return redirect()->route('category.index')->with('success', 'Category created successfully');
}

public function edit(Category $category)
{
    return view('admin.category.edit', compact('category')); // Match your Blade path
}

public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_description' => 'required|string',
        'category_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('category_image')) {
        $category->category_image = $request->file('category_image')->store('category', 'public');
    }

    $category->category_name = $request->name;
    $category->category_description = $request->category_description;
    $category->save();

    return redirect()->route('category.index')->with('success', 'Category updated successfully');
}

  public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted successfully');
    }
}

