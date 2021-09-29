<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatePost extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'category_post_name', 'category_post_status','category_post_slug', 'category_post_desc'
    ];
    protected $primaryKey = 'category_post_id';
 	protected $table = 'tbl_category_post';
    public function post(){
        $this->hasMany('App\Models\Post');
    }
}
