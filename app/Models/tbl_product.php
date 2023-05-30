<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_category',
        'product_name',
        'product_mrp',
        'product_price',
        'product_description',
        'product_image'
    ];
}
