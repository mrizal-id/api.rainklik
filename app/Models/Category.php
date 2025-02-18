<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'slug',
        'is_active',
        'image',
        'parent_id',
    ];

    /**
     * Relationship to parent category.
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Relationship to child categories.
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
