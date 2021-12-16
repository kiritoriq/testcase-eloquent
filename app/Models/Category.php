<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'category_name',
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
        return $this->hasOne(Product::class, 'category_id', 'id');
    }
}
