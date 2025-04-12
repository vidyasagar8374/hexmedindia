<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestBokkingDetail extends Model
{
    use HasFactory;
    protected $table = 'booked_test_details';
    public function name(){
        return $this->hasOne(Test::class, 'id', 'test_id');
    }
    public function pc(){
        return $this->hasOne(Package::class, 'id', 'test_id');
    }
}
