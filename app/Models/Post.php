<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'post_desc', 'post_content','post_status','post_image','post_title','post_slug','category_post_id',
    ];
    protected $primaryKey = 'post_id';
 	protected $table = 'tbl_posts';

    public function category_post(){
        return $this->belongsTo('App\Models\CatePost','category_post_id');
     }
}
