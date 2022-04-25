<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategorys extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'category_id',
    ];

    public function post()
    {
        return $this->belongsTo(Posts::class);
    }

    public function categorys()
    {
        return $this->belongsTo(Categorys::class);
    }
}
