<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'content',
        'thumbnail',
        'arrange',
        'description',
        'active'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function news()
    {
        return $this->hasMany('App\Models\News','id');
    }

}
