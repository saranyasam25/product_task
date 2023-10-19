<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories()
{
    return $this->belongsToMany(ProductCategory::class, 'category_product_pivot', 'product_category_id', 'product_detail_id');
}
}
