<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = "Products";
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'stock'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function detail()
    {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    }
}
