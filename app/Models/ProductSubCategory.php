<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
    use HasFactory;

    protected $table = 'products_subcategory';
    protected $primaryKey = 'products_subcategory_id';

    protected $fillable = [
        'pid',
        'name',
        'sub_category_img',
    ];

    // If your table does NOT have created_at/updated_at columns:
    public $timestamps = false;

    // (Optional) Define relationship to parent category:
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'pid', 'pid');
    }

   
}
