<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function products(){
        return $this->belongsToMany(Product::class, 'order_details');
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }
}
