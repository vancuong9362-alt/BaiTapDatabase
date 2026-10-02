<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = "tags";
    protected $fillable = [
        'id',
        'name'
    ];
    public function products()
    {
        return $this->belongsToMany(Products::class, 'product_tag', 'tag_id', 'product_id');
    }
}
