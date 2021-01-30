<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";
    protected $fillable = ['orders_id','invoice_id','card_number','date','charge_amount'];

	protected $dates = ['date'];
    protected $primaryKey = 'id';
}
