<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Categories extends Model
{
    use HasFactory;
    protected $primaryKey = 'cat_id';
    protected $fillable = [
        'cat_name'
    ];
}
