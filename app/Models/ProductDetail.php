<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'product_details';

    protected $fillable = [
        'product_id',
        'purchasing_price',
        'selling_price',
        'quantity',
        'created_at',
        'updated_at'
    ];

    public function getCreatedAtAttribute($date)
    {
        return date('Y-m-d', strtotime($date));
        // return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
