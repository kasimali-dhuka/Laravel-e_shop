<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'popular',
        'image',
        'meta_title',
        'meta_descrip',
        'meta_keywords'
    ];

    protected $hidden = [
        'slug',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'created_at',
        'updated_at'
    ];

    public function product() 
    {
        return $this->hasMany(Product::class);
    }

    public function img_url()
    {
        return Storage::exists($this->image) ? Storage::url($this->image) : Storage::url('category/default.png');
    }
}
