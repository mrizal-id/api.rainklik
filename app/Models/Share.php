<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'platform',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
