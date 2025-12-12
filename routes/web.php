<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EnquiryController;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyCategoryController;
use App\Http\Controllers\ServiceController;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductsCategoryController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryFolderController;

use App\Http\Controllers\AI2DInteriorController;

Route::get('/ai-2d-designer', [AI2DInteriorController::class, 'form'])->name('ai.2d.form');
Route::post('/ai-2d-designer/generate', [AI2DInteriorController::class, 'generate'])->name('ai.2d.generate');
Route::get('/ai-2d-designer/result', [AI2DInteriorController::class, 'result'])->name('ai.2d.result');

// Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/projects', function () {
    return view('project');
});
Route::get('/project/details', function () {
    return view('projectdetails');
});

Route::get('/product/{id}', [FrontendController::class, 'productDetailsById'])
     ->name('product.details');

// Route::get('/product/{id}', [FrontendController::class, 'productDetailsById'])->name('product.details');

Route::get('/blog', function () {
    return view('blog');
}); 
Route::get('/blogdetails', function () {
    return view('blogdetails');
});

Route::middleware('isAdmin')->group(function () {
    Route::post('admin/insertUser',[UsersController::class,'insertUser'])->name('insertUser');
        Route::get('editUser/{user_id}', [UsersController::class, 'editUser'])->name('editUser');
        Route::post('updateUser', [UsersController::class, 'updateUser'])->name('updateUser');
        Route::post('deleteUser', [UsersController::class, 'deleteUser'])->name('deleteUser');
        Route::get('updateProfile', [UsersController::class, 'updateProfile'])->name('updateProfile');
        Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('admin/allUsers', [UsersController::class, 'allUsers'])->name('allUsers');
        Route::post('update-user-status/{id}', [UsersController::class, 'updateStatus']);
    });

    // blog
    // frontend blog routes 
    // Old


// New



Route::get('admin/blog', [BlogController::class, 'index'])->name('blog.index');          // List blogs
   Route::get('admin/blog/create', [BlogController::class, 'create'])->name('blog.create'); // Add blog form
    Route::post('blog/store', [BlogController::class, 'storeService'])->name('blog.store'); // Save blog
    Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');  // Edit blog form
    Route::put('blog/update/{id}', [BlogController::class, 'update'])->name('blog.update'); // Update blog
    Route::post('blog/delete/{id}', [BlogController::class, 'deleteService'])->name('blog.delete'); // Delete blog


    // blog category
    Route::get('/blog-categories', [BlogCategoryController::class, 'index'])->name('blog.categories.index');
Route::post('/blog-categories/store', [BlogCategoryController::class, 'store'])->name('blog.categories.store');
Route::get('/blog-categories/edit/{pid}', [BlogCategoryController::class, 'edit'])->name('blog.categories.edit');
Route::post('/blog-categories/update/{pid}', [BlogCategoryController::class, 'update'])->name('blog.categories.update');

Route::middleware('isAdmin')->group(function () {
    Route::post('/blog-categories/delete/{pid}', [BlogCategoryController::class, 'destroy'])
        ->name('blog.categories.delete');
});



//admin user profile

Route::post('/register', [UsersController::class, 'registerUser'])->name('registerUser');
Route::get('login', [AdminController::class, 'loginView'])->name('login');
Route::post('userLogin', [FrontendController::class, 'userLogin'])->name('userLogin');
Route::get('logout', [FrontendController::class, 'logout'])->name('logout');
Route::get('userAuth/{user_id}/{auth_code}', [FrontendController::class, 'activate'])->name('activate');

//reset password
// Route::post('reset_password_link', [FrontendController::class, 'reset_password_link'])->name('reset_password_link');
// Route::get('reset_password/{auth_id}', [FrontendController::class, 'reset_password'])->name('reset_password');
// Route::post('update_password', [FrontendController::class, 'update_password'])->name('update_password');

Route::get('/reset', function () {
    return view('frontend.reset-password');
});

Route::get('/signup', function () {
    return view('admin.sign-up');
});

//enquiry
Route::get('admin/enquiries', [EnquiryController::class, 'enquiryLead'])->name('enquiries.enquiryLead');
Route::delete('/admin/enquiries/{id}', [EnquiryController::class, 'destroy'])->name('enquiries.destroy');

//enquiry form
Route::get('enquiry', [EnquiryController::class, 'showForm'])->name('enquiry.form');
Route::post('enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');


//banner

Route::middleware('isAdmin')->group(function () {
    Route::get('/admin/banners', [BannerController::class, 'index'])->name('banners.index');
    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::put('/banners/{id}', [BannerController::class, 'update'])->name('banners.update');
    Route::delete('/banners/{id}', [BannerController::class, 'destroy'])->name('banners.destroy');
});


//channel partner

Route::get('/reports/search', [FrontendController::class, 'search'])->name('reports.search');

Route::middleware('isAdmin')->group(function () {
//Reports

});

//gallery
Route::middleware('isAdmin')->prefix('admin')->name('admin.')->group(function () {

    // Gallery Folders (full CRUD: index, create, store, show, edit, update, destroy)
    Route::resource('gallery-folder', GalleryFolderController::class);

    // Gallery (full CRUD)
    Route::resource('gallery', GalleryController::class);

    // Optional: explicit create route (already included in resource, but you can keep if needed)
    Route::get('gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
});

//frontend reports

//frontend products
Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/projects', [FrontendController::class, 'projects'])->name('projects');
Route::get('product/{slug}', [FrontendController::class, 'productDetails'])->name('product.details');



//frontend capabilities
Route::get('/get-subcategories/{categoryId}', [ServiceController::class, 'getSubcategories']);
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('service.details');
Route::get('/get-categories', [ServiceController::class, 'getCategories']);
Route::get('/get-services', [ServiceController::class, 'getServices']);

Route::middleware('isAdmin')->group(function () {
//services
Route::get('admin/services', [ServiceController::class, 'index'])->name('services.index');
Route::post('/services/store', [ServiceController::class, 'storeService'])->name('services.store');
Route::get('/services/edit/{id}', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/update/{id}', [ServiceController::class, 'update'])->name('services.update');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services/delete/{id}', [ServiceController::class, 'delete'])->name('services.delete');
});

Route::middleware('isAdmin')->group(function () {
//products
Route::get('admin/products', [ProductsController::class, 'index'])->name('products.index'); Route::post('/products/update-status', [ProductsController::class, 'updateStatus'])->name('products.updateStatus');

Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store');
Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{id}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('products/delete/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');

Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');

Route::post('/admin/products/update-feature', [ProductsController::class, 'updateFeature'])
    ->name('products.updateFeature');

 
//serivce category & subcategory 

Route::prefix('products-categories')->group(function () {
    
    Route::get('/', [ProductsCategoryController::class, 'index'])->name('products.categories.index');
    Route::get('/create', [ProductsCategoryController::class, 'create'])->name('products.categories.create'); // Add this
    
    Route::post('/store', [ProductsCategoryController::class, 'store'])->name('products.categories.store');
    Route::get('/edit/{id}', [ProductsCategoryController::class, 'edit'])->name('products.categories.edit');
    Route::put('/update/{id}', [ProductsCategoryController::class, 'update'])->name('products.categories.update');
    Route::delete('/delete/{id}', [ProductsCategoryController::class, 'destroy'])->name('products.categories.destroy');

    //SubCAtegory


Route::prefix('products-categories/subcategories')->name('subcategories.')->group(function () {
    Route::get('/', [ProductSubCategoryController::class, 'index'])->name('index');
    Route::get('/create', [ProductSubCategoryController::class, 'create'])->name('create');
    Route::post('/store', [ProductSubCategoryController::class, 'store'])->name('store');
   
    Route::get('/edit/{id}', [ProductSubCategoryController::class, 'edit'])->name('productsubcategory.edit');
    Route::put('/update/{id}', [ProductSubCategoryController::class, 'update'])->name('productsubcategory.update');

    Route::get('/delete/{id}', [ProductSubCategoryController::class, 'destroy'])->name('delete');


    
});

});


Route::prefix('admin/products-category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('products.category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('products.category.store');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('products.category.edit');
    // Route::post('/update/{category}', [CategoryController::class, 'update'])->name('products.category.update');
    Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])->name('products.category.delete');
});



});

//news
Route::middleware('isAdmin')->group(function () {
    Route::prefix('admin/news')->name('admin.news.')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/create', [NewsController::class, 'create'])->name('create');
        Route::post('/store', [NewsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [NewsController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [NewsController::class, 'destroy'])->name('destroy');
    });
});
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
