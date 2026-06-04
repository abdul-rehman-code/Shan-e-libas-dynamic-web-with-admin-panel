<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $guarded = [];
    // Har item kisi ek order se belong karta hai
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    // Har item ka ek product hota hai
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
