<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $fillable = [
        'name', 'email', 'phone', 'subject', 'message'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'tbl_contacts';
}
