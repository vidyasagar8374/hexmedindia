<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchiseboy extends Model
{
    use HasFactory;
    protected $table = 'franchiseboys';
    public function boydetails(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function slots(){
        return $this->hasMany(BoysAvailibity::class, 'boy_id', 'user_id');
    }
}
