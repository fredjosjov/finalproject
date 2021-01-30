<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = "invoices";
    protected $fillable = ['status','total_amount','subtotal'];

    protected $primaryKey = 'id';
}
