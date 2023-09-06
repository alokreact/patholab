<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 

use App\Models\Package;

class Lab extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['lab_name','address1','state', 'city','pin','phone','image','status'];

    protected $timestamp = false;

    public function getParentTest(){
        return $this->hasOne (ParentTest::class, 'id', 'parent_test_id');
    }

    public function subtest(){

        return $this->belongsToMany(SubTest::class,'lab_package')
                     ->withPivot(['price']);
    }

}
