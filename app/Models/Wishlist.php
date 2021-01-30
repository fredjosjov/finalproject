<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = "wishlists";
    protected $fillable = ['customer_id','product_id','store_id','date_added'];

    protected $dates = ['date_added'];
    protected $primaryKey = 'id';
}
