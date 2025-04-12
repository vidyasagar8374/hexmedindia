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
}
