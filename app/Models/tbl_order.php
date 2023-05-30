<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'o_customer_id',
        'o_first_name',
        'o_last_name',
        'o_address',
        'o_email',
        'o_mobile',
        'o_status'
    ];
}
