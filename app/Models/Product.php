<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public $timestamps = true;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'price',
        'discount',
        'is_stock',
        'short_description',
        'description',
        'image',
        'list_image',
    ];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
        
    }

    public function orderDetail()
    {
        return $this->hasMany(order_detail::class);
        
    }

}