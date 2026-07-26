<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }

    public function promos() {
        return $this->hasMany(Promo::class);
    }

    public function testimonials() {
        return $this->hasMany(Testimonial::class);
    }
}
