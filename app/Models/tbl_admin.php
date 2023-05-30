<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_admin extends Model
{
    use HasFactory;
    protected $fillable = ['a_name', 'a_email', 'a_mobile', 'a_password'];
}
