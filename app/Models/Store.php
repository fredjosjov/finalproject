<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
