<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_detail_id', 'category_name',
    ];

    public function products()
    {
        return $this->belongsToMany(ProductDetail::class, 'category_product_pivot', 'product_detail_id', 'product_category_id');
    }
}
