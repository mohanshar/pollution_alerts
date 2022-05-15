<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sendsms extends Model
{
    use HasFactory;
    protected $table = 'sendsms';
    protected $guarded = ['id'];
}
