<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingDetails extends Model
{
    protected $table = "shipping_details";
    protected $fillable = ['shipping_id', 'order_id', 'product_id', 'status', 'ship_address'];

    protected $primaryKey = 'shipping_id';
}
