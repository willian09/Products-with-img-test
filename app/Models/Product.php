<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImages::class, 'product_id');
    }
}
