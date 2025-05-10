<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addwallet extends Model
{
    use HasFactory;
    protected $table ='addwallet';
    public function boydetails(){
        return $this->hasOne(User::class, 'id', 'franchiseid');
    }
    public function franchisedeatails(){
        return $this->hasMany(FranchiseOwnerDetails::class, 'franchise_id', 'franchiseid');
    }
    public function created_users(){
        return $this->hasOne(User::class,'id','created_user');
    }
}
