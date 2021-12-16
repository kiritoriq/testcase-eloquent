<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'product_name',
        'product_description',
        'product_image',
        'created_at',
        'updated_at'
    ];

    public function getCreatedAtAttribute($date)
    {
        return date('Y-m-d', strtotime($date));
        // return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function details()
    {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
