<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";
    // protected $fillable = ['customerId','productId','storeId','quantity','price'];
    public $timestamps = false;

    protected $primaryKey = 'id';
}
