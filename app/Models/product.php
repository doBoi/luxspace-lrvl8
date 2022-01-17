<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price', 'slug'
    ];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function carts()
    {
        return $this->hasOne(Cart::class, 'products_id', 'id');
    }

    public function transactionitems()
    {
        return $this->belongsTo(Transactionitem::class, 'id', 'products_id');
    }
}
