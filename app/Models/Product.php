<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'product_name',
        'price_id',
        'multiple_img',
        'specification',
        'f_que',
        'f_ans',
        'feature',
        'toprated',
        'premium',
        'description',
        'slug',
        'meta_title',
        'meta_key',
        'meta_description',
        'status',
        
    ];

    protected $casts = [
        'multiple_img' => 'array',
        'toprated' => 'boolean',
        'premium' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'pid');
    }
}
