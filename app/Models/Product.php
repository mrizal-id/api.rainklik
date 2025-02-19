<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'discount_price',
        'stock',
        'type',
        'image_url',
        'video_url',
        'license_type',
        'license_expiry',
        'download_limit',
        'is_active',
        'is_returnable',
        'warranty_period',
        'category_id',
        'parent_category_id',
        'physical_shipping',
        'shipping_method_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class);
    }
}
