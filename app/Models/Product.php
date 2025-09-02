<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'sku',
        'description',
        'price',
        'stock',
        'image',
    ];
    
    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function wishlistedByUsers()
    {
        return $this->belongsToMany(User::class, 'wishlists')->withTimestamps();
    }

    // Auto-generate SKU if not provided
    protected static function booted()
    {
        static::creating(function ($product) {
            if (empty($product->sku)) {
                $prefix = 'PRD-';
                $unique = strtoupper(Str::random(4)); // random 4 letters/numbers
                $product->sku = $prefix . date('Ymd') . '-' . $unique;
            }
        });
    }
}