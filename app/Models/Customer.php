<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $fillable = ['firstName','lastName','phone','address'];

    protected $primaryKey = 'id';

    use HasFactory;

    public function account(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function usesTimestamps():bool
    {
        return false;
    }
}
