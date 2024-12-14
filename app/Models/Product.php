<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['pro_name', 'price','pro_detail','pro_photo','cat_id'];
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'cat_id', 'cat_id');
    }
}
