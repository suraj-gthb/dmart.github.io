<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_order_products extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'customer_id',
        'product_id',
        'product_name',
        'product_price',
        'product_quantity',
        'total'
    ];
}
