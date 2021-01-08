<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    public function account(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function store(){
        return $this->hasOne(Store::class);
    }

    public function usesTimestamps():bool
    {
        return false;
    }
}
