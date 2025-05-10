<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    use HasFactory;
     public function products(){
        return $this->hasMany(orderproducts::class, 'order_id', 'id');
    }
    public function userdata(){
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    public function franchise(){
        return $this->hasOne(FranchiseOwnerDetails::class, 'franchise_id','user_id');
    }

}
