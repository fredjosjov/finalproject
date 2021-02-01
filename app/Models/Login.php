<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'users';
    public $timestamps = 'false';
    protected $fillable = ['email, password'];
}
