<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    public function cartlist(){
        return $this->hasMany(product::class, 'id', 'prodcut_id');
    }
}
