<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Lab;

use App\Models\OrderItem;

class Order extends Model
{
    protected $guarded = [];
    protected $table ='orders';
    protected $fillable =['user_id','total','status'];

    public function OrderItems(){

        return $this->hasMany(OrderItem::class,'order_id','id');
    }
    
}
