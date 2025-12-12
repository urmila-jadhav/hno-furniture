<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Models\PasswordResets;
use App\Models\News;
use App\Models\Banner;
use App\Models\Product;
use App\Models\ProductCategory; 
use App\Models\ProductSubcategory; 
use Illuminate\Support\Facades\Log;

class FrontendController extends Controller
{
public function index()  
{
    // Fetch all banners
    $banners = Banner::all();

    // Fetch all categories
    $categories = DB::table('products_category')
        ->select('pid', 'category_name', 'category_image')
        ->orderByDesc('pid')
        ->get();

    // Attach the first product slug to each category
    foreach ($categories as $category) {
        $firstProduct = DB::table('products')
            ->where('category_id', $category->pid)
            ->select('slug')
            ->first();
        
        $category->first_product_slug = $firstProduct->slug ?? null; // null if no product
    }

    // Fetch all products with category, subcategory, and price info
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
        ->orderByDesc('products.id')
        ->get();

    // Fetch all subcategories
    $subcategories = DB::table('products_subcategory')
        ->leftJoin('products_category', 'products_subcategory.pid', '=', 'products_category.pid')
        ->select('products_subcategory.*', 'products_category.category_name')
        ->get();

    return view('index', compact('banners', 'products', 'subcategories', 'categories'));
}


public function productDetailsById($id)
{
    // main product
    $product = DB::table('products')
        ->leftJoin('products_category', 'products.category_id', '=', 'products_category.pid')
        ->leftJoin('products_subcategory', 'products.sub_category_id', '=', 'products_subcategory.products_subcategory_id')
        ->leftJoin('price_range', 'products.price_id', '=', 'price_range.range_id')
        ->select(
            'products.*',
            'products_category.category_name',
            'products_subcategory.name as subcategory_name',
            'products_subcategory.products_subcategory_id as subcategory_id',
            'price_range.from_price',
            'price_range.to_price'
        )
        ->where('products.id', $id)
        ->first();

    if (!$product) {
        abort(404, 'Product not found');
    }

  $subcategories = DB::table('products_subcategory')
    ->select('products_subcategory_id', 'name', 'sub_category_img')
    ->get();

    // Fetch all categories (for dynamic category links in Blade)
    $categories = DB::table('products_category')->get();

    return view('projectdetails', [
        'product' => $product,
        'subcategories' => $subcategories,
        'categories' => $categories
    ]);
}



   
//frontend category
 public function projects()
    {
        // Fetch all categories
        $categories = ProductCategory::all(); // get all categories from DB

       // Fetch all subcategories (for grid)
    $subcategories = ProductSubcategory::with('category')->get();

    return view('project', compact('categories', 'subcategories'));
    }




// blog section

public function blog(Request $request)
    {
        $query = DB::table('blog')
            ->select(
                'blog.id',
                'blog.image',
                'blog.blog_name',
                'blog.description',
                'blog.slug',
                'blog.meta_title',
                'blog.meta_keywords',
                'blog.meta_description',
                'blog.created_at',
                'blog.updated_at',
                'blog.schema_markup',
                'blog.publish_date',
                'blog.tag',
                'blog.status',
                'blog.author_name',
                'blog.category_id',
                'blog_category.category_name'
            )
            ->leftJoin('blog_category', 'blog.category_id', '=', 'blog_category.pid')
            ->where('blog.status', 'active');

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('blog.blog_name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('blog.description', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('blog_category.category_name', 'LIKE', '%' . $request->search . '%');
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('blog.category_id', $request->category);
        }

        // $data['allIndustries'] = $query->paginate(12)->appends($request->all());

        // Fetch categories
        $data['categories'] = DB::table('blog_category')
            ->select('pid', 'category_name')
            ->get();

        return view('frontend.blog', $data);
    }

    // Blog details by slug
public function showBlog($slug)
{
    // Main blog
    $blog = DB::table('blog')
        ->join('blog_category', 'blog.category_id', '=', 'blog_category.pid')
        ->select('blog.*', 'blog_category.category_name as category_name')
        ->where('blog.slug', $slug)
        ->first();

    if (!$blog) {
        abort(404);
    }

    // Related blogs
    $relatedBlogs = DB::table('blog')
        ->select('id','blog_name','slug','image','description','created_at','category_id')
        ->where('slug', '!=', $slug)
        ->where('category_id', $blog->category_id)
        ->latest()
        ->take(3)
        ->get()
        ->map(function($item) {
            $item->slug = (string) $item->slug; // ✅ Cast slug as string
            return $item;
        });

    // Latest blogs
    $latestBlogs = DB::table('blog')
        ->select('id','blog_name','slug','image','description','created_at','category_id')
        ->where('slug', '!=', $slug)
        ->latest()
        ->take(3)
        ->get()
        ->map(function($item) {
            $item->slug = (string) $item->slug; // ✅ Cast slug as string
            return $item;
        });

    return view('frontend.blog-details', compact('blog', 'relatedBlogs', 'latestBlogs'));
}

 public function userLogin(Request $req)
    {
        // Validate the input
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'password.required' => 'The password field is required.',
            'password.min' => 'Password must be at least 6 characters.',
        ]);

        $email = $req->input('email');
        $p = md5($req->input('password'));

        // Fetch user data including the password
        $users = DB::select('
            SELECT u.id, u.name, u.email_id, u.password, p.mobile_no, r.id as role_id, r.name as role_name, u.is_email_verify
            FROM users u
            JOIN profile p ON u.id = p.user_id
            JOIN roles r ON r.id = u.role_id
            WHERE u.email_id = ?
        ', [$email]);

        if (count($users) === 0) {
            // Username (email) not found
            return redirect()->back()->with('error', 'Incorrect username.');
        }

        $user = $users[0]; // Assuming there is only one matching user

        // Check password and email verification
        if ($user->password !== $p) {
            // Password does not match
            return redirect()->back()->with('error', 'Incorrect password.');
        }

        if (!$user->is_email_verify) {
            // Email not verified
            return redirect()->back()->with('error', 'Email not verified.');
        }

        // Set session variables
        Session::put('username', $user->name);
        Session::put('role_name', $user->role_name);
        Session::put('user_id', $user->id);
        Session::put('role_id', $user->role_id);
        Session::put('email', $user->email_id);

        // Redirect based on role_id
        switch ($user->role_id) {
            case 4:
                return redirect('admin/dashboard');
            case 1:
                return redirect('/');
            default:
                return redirect('/');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    public function PropDetailsView($property_id){
        $data['propertie_details'] = DB::select('select * from properties as p, price_range as pr, property_category as pc where 
        p.price_range_id = pr.range_id and pc.pid = p.property_type_id and p.properties_id =' . $property_id);
        $data['additional_images'] = DB::table('property_images')
        ->where('properties_id', $property_id)
        ->get();

        return view('frontend.property-details-test',compact('data'))
        ->with([
            'meta_title' => $propertyDetails[0]->meta_title ?? 'Default Property Title',
            'meta_description' => $propertyDetails[0]->meta_description ?? 'Default Property Description',
            'meta_keywords' => $propertyDetails[0]->meta_keywords ?? 'Default Keywords'
        ]);;
    }

    // public function reports(){
    //     $data['allReports'] = DB::table('reports')
    //         ->select(
    //             'id',
    //             'image',
    //             'report_name',
    //             'description',
    //             'slug',
    //             'meta_title',
    //             'meta_keywords',
    //             'meta_description',
    //             'created_at',
    //             'updated_at'
    //         )
    //         ->paginate(700);

    //     return view('frontend.reports', $data);

    //     $data['allReports'] = DB::table('reports')
    //         ->select('id', 'report_name')
    //         ->get();

    //     return view('frontend.layouts.footer', $data);
    // }

    public function services()
    {
        $data['allServices'] = DB::table('services')
            ->select(
                'id',
                'property_subcategory_id',
                'image',
                'service_name',
                'description',
                'slug',
                'meta_title',
                'meta_keywords',
                'meta_description',
                'created_at',
                'updated_at'
            )
            ->paginate(700);

        return view('frontend.services', $data);

        $data['allServices'] = DB::table('services')
            ->select('id', 'service_name')
            ->get();

        return view('frontend.layouts.footer', $data);
    }

    // public function products()
    // {
    //     $data['allProducts'] = DB::table('products')
    //         ->select(
    //             'id',
    //             'image',
    //             'insights_name',
    //             'description',
    //             'slug',
    //             'meta_title',
    //             'meta_keywords',
    //             'meta_description',
    //             'created_at',
    //             'updated_at'
                
    //         )
    //         ->paginate(700);

    //     return view('frontend.products', $data);
    // }

    // public function industries()
    // {
    //     $data['allIndustries'] = DB::table('industries')
    //         ->select(
    //             'id',
    //             'image',
    //             'industries_name',  // Fixed column name
    //             'description',
    //             'slug',
    //             'meta_title',
    //             'meta_keywords',
    //             'meta_description',
    //             'created_at',
    //             'updated_at',
    //             'industries_subcategory_id' // Fixed column name
    //         )
    //         ->paginate(700);

    //     return view('frontend.industries', $data);
    // }
public function search(Request $request)
{
    $query = $request->input('query');
    Log::info('Search method hit with query:', ['query' => $query]);

    $reports = DB::table('reports')
        ->where('report_name', 'like', '%' . $query . '%') // Only searching by report_name
        ->orderBy('publish_date', 'desc')
        ->paginate(10);

    Log::info('Reports fetched:', ['count' => $reports->total()]);

    return view('frontend.reports.list', compact('reports', 'query'));
}
}
