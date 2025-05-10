<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
   
    public function details(){
        return $this->hasMany(PackageDetail::class, 'package_id','id');
    }
    public function name(){
        return $this->hasMany(Packages::class, 'id','test_id');
    }
    public function createuser(){
        return $this->hasOne(User::class,'id','created_user');
    }
    public function updateuser(){
        return $this->hasOne(User::class,'id','updated_user');
    }
}
