<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable =['code','expires_at','name','type','amount'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
