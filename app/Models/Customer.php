<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function account(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function usesTimestamps():bool
    {
        return false;
    }
}
