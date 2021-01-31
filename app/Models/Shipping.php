<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
	protected $table = "shippings";
    protected $fillable = ['method','vendor','expectedDuration'];

	protected $dates = ['expectedDuration'];
    protected $primaryKey = 'id';

    use HasFactory;

    public function orders(){
        return $this->belongsToMany(Order::class, 'shipping_details');
    }

    public function usesTimestamps():bool
    {
        return false;
    }
}
