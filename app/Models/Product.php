<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description'
    ];

    protected $hidden = [
        'slug',
        'original_price',
        'tax',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'created_at',
        'updated_at'
    ];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'prod_id');
    }

    public function img_url()
    {
        return Storage::exists($this->image) ? Storage::url($this->image) : Storage::url('category/default.png');
    }
}
