<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "reviews";
    protected $fillable = ['customer_id','product_id','description','rate','date'];

    protected $dates = ['date'];
    protected $primaryKey = 'id';
}
