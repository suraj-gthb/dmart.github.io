<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'product_id',
        'product_name',
        'product_price',
        'product_image',
        'product_quantity'
    ];
}
