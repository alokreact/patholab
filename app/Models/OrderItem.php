<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SubTest;
use App\Models\Package;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    
    protected $fillable =['product_id','user_id','order_id','price','qty','report_url','patient_id','type'];

    public function subtest()
    {
        return $this->hasMany(SubTest::class,'id','product_id');
        
    }

    public function package()
    {

        return $this->hasMany(Package::class,'id','product_id');
        
    }

}
