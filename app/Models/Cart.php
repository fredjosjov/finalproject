<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = ['customer_id', 'product_id', 'store_id', 'quantity', 'price'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
