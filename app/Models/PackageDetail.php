<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageDetail extends Model
{
    use HasFactory;
    public function testdetails(){
        return $this->hasOne(Test::class, 'id','test_id');
    }
    
}
