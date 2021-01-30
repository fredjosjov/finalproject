<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    protected $table = "cards";
    protected $fillable = ['card_number', 'type'];

    protected $primaryKey = 'card_number';
}
