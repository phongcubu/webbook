<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    // use HasFactory;
   
    // protected $fillable = [
       
    // ];
    // protected $primaryKey = 'id_statistical';
    // protected $table = 

    use HasFactory;
    public $timestamps = false; //set time to false
    protected $table = 'tbl_statistical';
    protected $fillable = [
        'order_date', 'sales','profit','quantity','total_order',
    ];

}
