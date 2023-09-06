<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Lab;

class Order extends Model
{
    protected $guarded = [];
    protected $table ='orders';
    protected $fillable =['user_id','total','status'];
    
}
