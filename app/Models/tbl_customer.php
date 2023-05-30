<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'c_first_name',
        'c_last_name',
        'c_email',
        'c_mobile',
        'c_password'
    ];
}
