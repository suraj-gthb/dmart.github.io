<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_wishlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'product_id',
        'product_name',
        'product_mrp',
        'product_price',
        'product_image'
    ];
}
