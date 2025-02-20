<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'cover',
        'category',
        'tags',
        'user_id',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shares()
    {
        return $this->hasMany(Share::class);
    }

    public function shareCount()
    {
        return $this->shares()->count();
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }
    public function getFormattedTitleAttribute()
    {
        return ucwords($this->attributes['title']);
    }
    // Mutator untuk otomatis membuat slug berdasarkan title
    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }
}
