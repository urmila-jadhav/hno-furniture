<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class ProductCategory extends Model
// {
//     protected $table = 'products_category';
//     protected $primaryKey = 'pid';
//     public $timestamps = false;

   
// }

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class ProductCategory extends Model
// {
//     protected $table = 'products_category';
//     protected $primaryKey = 'pid';
//     public $timestamps = false;

    // Relationship: Category has many Products
//     public function products()
//     {
//         return $this->hasMany(Product::class, 'category_id', 'pid');
//     }
// }



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
   
 use HasFactory;

    protected $table = 'products_category'; // your table name
    protected $fillable = [
        'category_name',
        'category_image',
        'banner_image',
        'description'
    ];

     public function subcategories()
    {
        return $this->hasMany(ProductSubcategory::class, 'pid');
    }
 // Category → FAQ Relation
    public function faqs()
    {
        return $this->hasMany(CategoryFaq::class, 'category_id', 'pid');
    }
}
