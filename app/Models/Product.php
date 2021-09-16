<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'product_name',
        'product_desc',
        'product_content',
        'product_price',
        'product_price_sale',
        'product_image',
        'product_status',
    ];
    protected $primaryKey ='product_id';
    protected $table='tbl_product';

}
