<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_product_inward extends Model
{
    use HasFactory;
    protected $fillable = [
        'in_product_id',
        'in_total_quantity'
    ];
}
