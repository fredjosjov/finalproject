<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = "orders";
    protected $fillable = ['customer_id','seller_id','totalAmount','status'];

    protected $primaryKey = 'id';

    use HasFactory;

    public function products(){
        return $this->belongsToMany(Product::class, 'order_details')
            ->withPivot('quantity', 'price');
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }
}
