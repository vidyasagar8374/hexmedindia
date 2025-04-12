<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactiondetails extends Model
{
    protected $table ='transactiondetails';
    use HasFactory;
    public function franchisedetails(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function testdetails(){
        return $this->hasMany(BookedTest::class, 'payment_ref', 'payment_ref');
    }
    
}
