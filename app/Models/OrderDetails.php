<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = "order_details";
    protected $fillable = ['order_id','product_id','quantity','price'];

    protected $primaryKey = 'order_id';
}
